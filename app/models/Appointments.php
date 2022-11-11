<?php

class Appointments extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'appointments');
    }

    public function all($company,$username) {
        $sql  = 'SELECT * FROM appointments WHERE company = ? AND username = ? ORDER BY id DESC';
        $result = $this->db->exec($sql,array($company,$username));
        return $result;
    }

    public function apiappointmentlist($id) {
        // Selecting data
        $sql  = 'SELECT id,clientname ';
        $sql .= 'FROM appointments WHERE username = ?';
        $result = $this->db->exec($sql,$id);
        echo json_encode($result);
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
        // Updating data
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id) {
	// Removing cliente
        $this->load(array('id=?',$id));
        $this->erase();
    }

}
?>
