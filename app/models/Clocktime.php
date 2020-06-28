<?php

class Clocktime extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'clocktime');
    }

    public function all($company) {
        $sql  = 'SELECT * FROM clocktime WHERE company = ? ORDER BY id DESC';
        $result = $this->db->exec($sql,$company);
        return $result;
    }

    public function add() {
        $this->copyFrom('POST');
        $this->save();
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

    public function delete($rid) {
        $this->load(array('id=?',$rid));
        $this->erase();
    }

}
?>
