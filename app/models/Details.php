<?php

class Details extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'invoicesd');
    }

    public function all($id) {
        $sql  = 'SELECT * FROM invoicesd WHERE relation = ? ORDER BY transdate DESC';
        $result = $this->db->exec($sql,$id);
        return $result;
    }

    public function add() {
        $this->copyFrom('POST');
        $this->save();
    }

    public function getRid($id) {
	$sql = 'SELECT relation FROM invoicesd WHERE id = ?';
	$result = $this->db->exec($sql,$id);
	return $result;
    }

    public function getById($id) {
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
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
