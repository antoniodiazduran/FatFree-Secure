<?php

class Sites extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'sites');
    }

    public function all($user) {
        // Selecting data
        $sql  = 'SELECT * FROM sites  ORDER BY timestamp DESC';
        $result = $this->db->exec($sql);
        return $result;
    }

    public function apisites($user) {
        // Selecting data
        $sql  = 'SELECT id,city FROM sites ORDER BY city';
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