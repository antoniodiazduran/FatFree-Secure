<?php

class People extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'people');
    }

    public function all($relation) {
        // Selecting data
        $sql  = "SELECT * FROM people ORDER BY lastname";
        $result = $this->db->exec($sql,$relation);
        return $result;
    }

    public function status($id) {
        $sql = "SELECT active FROM people WHERE id = ?";
        return $this->db->exec($sql,$id);
    }
    
    public function active($id,$status) {
        $sql = "UPDATE people SET active = ? WHERE id = ?";
        return $this->db->exec($sql,array($status,$id));
    }

    public function apitrainee($tid) {
        // Selecting data
        $sql  = 'SELECT id,concat(lastname, ", " , firstname)  AS name FROM people WHERE accesscode = ?';
        $result = $this->db->exec($sql,$tid);
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
