<?php

class Login extends DB\SQL\Mapper{

    public function __construct(DB\SQL $d1) {
        parent::__construct($d1,'bpuser');
    }

    public function all() {
        $this->load();
        return $this->query;
    }

    public function checkusername($id) {
	$sql = 'SELECT count(*) as total FROM  bpuser WHERE username = ?';
	$result = $this->db->exec($sql,$id);
	echo $result[0]['total'];
	exit;
    }
    public function getById($id) {
        $this->load(array('id=?',$id));
        return $this->query;
    }

    public function getByName($name) {
        $this->load(array('username=?', $name));
    }

    public function add() {
        $this->copyFrom('POST');
        $this->save();
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
