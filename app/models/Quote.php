<?php

class Quote extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'quote');
    }

    public function all($crit) {
        //if ($crit=='') {
            $this->load(array(),array('order'=>'transdate DESC'));    
        //} else {
        //    $this->load(array('unit=?',$crit),array('order'=>'strDate DESC'));
        //}
        return $this->query;
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

    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }

    
}
?>
