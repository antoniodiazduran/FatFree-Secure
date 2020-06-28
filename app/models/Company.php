<?php

class Company extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'company');
    }

    public function all($user) {
        // Selecting data
        $sql  = 'SELECT * FROM company  ORDER BY name DESC';
        $result = $this->db->exec($sql);
        return $result;
    }

    public function apicompany() {
        // Selecting data
        $sql  = 'SELECT id,name FROM company ORDER BY name';
        $result = $this->db->exec($sql);
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
