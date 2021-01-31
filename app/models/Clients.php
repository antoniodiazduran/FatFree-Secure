<?php

class Clients extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'clients');
    }

    public function all($company) {
        $sql  = 'SELECT * FROM clients WHERE company = ? ORDER BY id DESC';
        $result = $this->db->exec($sql,$company);
        return $result;
    }

    public function houses($company,$id) {
        $sql  = 'SELECT h.*,c.id as clientid FROM houses h, clients c  WHERE h.company = ? and h.relation = ? and h.relation = c.id ORDER BY id DESC';
        $result = $this->db->exec($sql,array($company,$id));
        return $result;
    }

    public function clientname($company,$id) {
        $sql  = 'SELECT clientname FROM clients WHERE company = ? and id = ? ORDER BY id DESC';
        $result = $this->db->exec($sql,array($company,$id));
        return $result[0]['clientname'];
    }

    public function apiclientlist($id) {
        // Selecting data
        $sql  = 'SELECT id,clientname ';
        $sql .= 'FROM clients WHERE username = ?';
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
