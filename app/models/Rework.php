<?php

class Rework extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'rework');
    }

    public function all($relation) {
        // Selecting data
        if ($relation == 0) {
            $sql  = "SELECT * FROM rework ORDER BY reason";
        } else {
            $sql  = "SELECT * FROM rework WHERE relation = ? ORDER BY reason";
        }
        $result = $this->db->exec($sql,$relation);
        return $result;
    }

    public function apidowntime($relation) {
        // Selecting data
        $sql  = 'SELECT id,reason FROM rework WHERE relation = ? ORDER BY reason';
        $result = $this->db->exec($sql,$company);
        echo json_encode($result);
    }
    public function apidowntimefilter($filter,$id) {
        // Selecting data
        $sql  = 'SELECT id,reason FROM rework WHERE '.$filter.' = ? ORDER BY reason';
        $result = $this->db->exec($sql,$id);
        echo json_encode($result);
    }

    public function add() {
        // Add data
        $this->copyFrom('POST');
        $this->save();
    }

    public function getById($id) {
        // Getting data
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
    }

    public function edit($id) {
        // Updating data
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id) {
	    // Removing expense
        $this->load(array('id=?',$id));
        $this->erase();
    }

}
?>
