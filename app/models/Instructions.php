<?php

class Instructions extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'instructions');
    }

    public function all($id,$user) {
        // Selecting data
        $sql  = 'SELECT * FROM instructions WHERE relation = ? AND username = ? ORDER BY sequence';
        $result = $this->db->exec($sql,array($id,$user));
        return $result;
    }

    public function relation($id) {
        // Selecting data
        $sql  = 'SELECT relation FROM instructions WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['relation']; // Getting the relation number from the instructions
    }

    public function breadcrumbs($id,$user) {
        // Selecting data
        $sql  = 'SELECT title,product,machine FROM stations_view1 WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['title'].' :: '.$result[0]['product'].' :: '.$result[0]['machine'];
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
