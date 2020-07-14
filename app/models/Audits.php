<?php

class Audits extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'audits');
    }

    public function all($relation) {
        // Selecting data
        if ($relation == 0) {
            $sql  = "SELECT * FROM audits ORDER BY title";
        } else {
            $sql  = "SELECT * FROM audits WHERE relation = ? ORDER BY title";
        }
        $result = $this->db->exec($sql,$relation);
        return $result;
    }

    public function apiaudits($relation) {
        // Selecting data
        $sql  = 'SELECT id,title FROM audits WHERE relation = ? ORDER BY title';
        $result = $this->db->exec($sql,$company);
        echo json_encode($result);
    }
    public function apiauditsfilter($filter,$id) {
        // Selecting data
        $sql  = 'SELECT id,title FROM audits WHERE '.$filter.' = ? ORDER BY title';
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
