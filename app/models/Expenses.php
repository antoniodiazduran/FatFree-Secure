<?php

class Expenses extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'expenses');
    }

    public function all($user) {
        $sql  = 'SELECT * FROM expenses_view1 WHERE username = ? ORDER BY transdate DESC';
        $result = $this->db->exec($sql,$user);
        return $result;
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
