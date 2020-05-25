<?php

class Po extends DB\SQL\Mapper{

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'0000_AllPOlines');
    }

    public function all($crit) {
//        $this->load(
//		array('[Buy-fromBusinessPartner]=?',$crit),
//		array('order'=>'OrderDate DESC','limit'=>25) 
//		);
//        return $this->query;
        $query  = 'SELECT TOP 25 PurchaseOrder,OrderDate,POStatus,count(position) AS Position FROM [0000_AllPOlines] ';
        $query .= ' WHERE POStatus=\'In Process\' AND [Buy-fromBusinessPartner]=:bsp';
        $query .= ' GROUP BY PurchaseOrder, OrderDate,POStatus ';
        $query .= ' ORDER BY OrderDate DESC';
        $result =  $this->db->exec($query,array(':bsp'=>$crit));
        return $result;
    }
    public function query($crit,$pst,$ofs) {
//        $this->load(
//	  	 array('PurchaseOrder','OrderDate','POStatus'),
//               array('[Buy-fromBusinessPartner]=? and POStatus=?',$crit,$pst),
//               array('group'=>'PurchaseOrder','limit'=>100,'offset'=>$ofs)
//        );
//        return $this->query;
	$query  = 'SELECT TOP '.$ofs.' PurchaseOrder,OrderDate,POStatus,count(position) AS Position FROM [0000_AllPOlines] ';
	$query .= ' WHERE POStatus=:pst AND [Buy-fromBusinessPartner]=:bsp';
	$query .= ' GROUP BY PurchaseOrder, OrderDate,POStatus ';
	$query .= ' ORDER BY OrderDate DESC';
	$result =  $this->db->exec($query,array(':pst'=>$pst,':bsp'=>$crit));
	return $result;
    }
    public function detail($pon) {
        $this->load(
               array('PurchaseOrder=?',$pon),
               array('order'=>'Position')
               );
        return $this->query;
    }

    public function getById($id) {
        $this->load(array('id=?',$id));
        return $this->query;
    }

    public function getByName($name) {
        $this->load(array('[Buy-fromBusinessPartner]=?', $name));
    }

    public function add() {
        $this->copyFrom('POST');
        $this->save();
    }

    public function edit($id) {
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }
}

?>
