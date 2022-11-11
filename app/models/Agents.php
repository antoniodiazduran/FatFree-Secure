<?php

class Agents extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'agents');
    }

    public function all($company,$username,$roles) {
	if($roles=='Superuser') {
        $sql  = 'SELECT * FROM agents WHERE company = ?  ORDER BY id DESC';
        $result = $this->db->exec($sql,array($company));
	} else {
        $sql  = 'SELECT * FROM agents WHERE company = ? AND username = ? ORDER BY id DESC';
        $result = $this->db->exec($sql,array($company,$username));
	}
        return $result;
    }

    public function apiagentlist() {
        // Selecting data
        $sql  = 'SELECT id,agentname ';
        $sql .= 'FROM agents ORDER BY agentname ASC';
        $result = $this->db->exec($sql);
        //echo json_encode($result);
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
