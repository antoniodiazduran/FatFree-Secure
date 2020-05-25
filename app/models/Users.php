<?php

class Users extends DB\SQL\Mapper {

    public function __construct(DB\SQL $d1) {
        parent::__construct($d1,'bpuser');
    }

    public function all($crit) {
        //if ($crit=='') {
            $this->load(array(),array('order'=>'username ASC'));
        //} else {
        //    $this->load(array('order'=>'timestamp DESC'));
        //}
        return $this->query;
    }

    public function getPass($id) {
        return $this->db->exec('select password from bpuser where id=?',$id);
    }

    public function add() {
        $this->copyFrom('POST');
        $this->save();
    }

    public function getById($id) {
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
    }

    public function getByName($name) {
        $this->load(array('username=?',$name));
        $this->copyTo('POST');
    }

    public function edit($id) {
        $this->load(array('id=:id',array(':id'=>$id)));
       	$this->copyFrom('POST');
       	$this->update();
    }

    public function delete($id) {
        $this->load(array('id=:id',array(':id'=>$id)));
        $this->erase();
    }

}
?>
