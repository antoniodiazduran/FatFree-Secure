<?php

class Expenses extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'expenses');
    }

    public function all($company) {
        $sql  = 'SELECT * FROM expenses_view3 WHERE company = ? ORDER BY id DESC';
        $result = $this->db->exec($sql,$company);
        return $result;
    }

    public function apiexpensesdetail($id) {
        // Selecting data
        $sql  = 'SELECT DATE_FORMAT(transdate,"%Y/%m/%d") AS transdate ,description,FORMAT(qty+taxes,2) AS total, FORMAT(qty,2) AS price ';
	$sql .= 'FROM expenses_view4 WHERE id = ?';
        $result = $this->db->exec($sql,$id);
        echo json_encode($result);
    }

    public function apiexpensesfilter($customer,$company) {
        // Selecting data
        $sql  = 'SELECT id,area,description FROM expenses_view4 WHERE customer = ? AND company = ? AND invoice is null';
        $result = $this->db->exec($sql,array($customer,$company));
        echo json_encode($result);
    }

    public function add() {
        $this->copyFrom('POST');
        $this->save();
	if($_POST['receipt']>0) {
		$sql = 'UPDATE upfiles SET expense = '.$this->id.' WHERE id = '.$_POST['receipt'];
		$this->db->exec($sql);
	}
    }

    public function getById($id) {
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
    }

    public function edit($id) {
	// getting old receipt file
	$sql  = 'SELECT id FROM upfiles WHERE expense = '.$id;
	$result = $this->db->exec($sql);
	// freeing image 
	$oldid = $result[0]['id']*1;
	if($oldid > 0) {
		$sql  = 'UPDATE upfiles SET expense = 0 WHERE id = '.$oldid;
		$this->db->exec($sql);
	}
        // Updating new expense
	$newid = $_POST['id'];
	$newre = $_POST['receipt'];
	//echo "n".$newid."e:".$newre;
	$sql  = 'UPDATE upfiles SET expense = '.$newid.' WHERE id = '.$newre;
	$this->db->exec($sql);
        // Updating data
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id) {
	// Removing reciept
        $sql  = 'UPDATE upfiles SET expense = 0 WHERE expense = '.$id;
        $this->db->exec($sql);
	// Removing expense
        $this->load(array('id=?',$id));
        $this->erase();
    }

}
?>
