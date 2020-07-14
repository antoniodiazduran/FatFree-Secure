<?php

class Questions extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'questions');
    }

    public function all($relation) {
        // Selecting data
        if ($relation == 0) {
            $sql  = "SELECT * FROM questions ORDER BY title";
        } else {
            $sql  = "SELECT * FROM questions WHERE relation = ? ORDER BY title";
        }
        $result = $this->db->exec($sql,$relation);
        return $result;
    }

    public function breadcrumbs($id) {
        // Selecting data
        $sql  = 'SELECT title FROM audits WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['title'];
        
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
