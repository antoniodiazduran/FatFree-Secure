<?php

class Houses extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'houses');
    }

    public function all($company,$userid) {
        $sql  = 'SELECT h.*,c.id as clientid, c.clientname FROM houses h, clients c WHERE h.company = ? and h.username = ? and h.relation = c.id ORDER BY id DESC';
        $result = $this->db->exec($sql,array($company,$userid));
        return $result;
    }
    public function houseAddress($id) {
        $sql  = 'SELECT CONCAT(address,", ",city,", ",zip) as address FROM houses WHERE id = ?';
        $result = $this->db->exec($sql,$id);
        return $result[0]['address'];
    }
    public function clientName($id) {
        $sql  = 'SELECT clientname FROM clients  WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['clientname'];
    }
    public function alldocs($company,$id,$userid) {
	$sql  = 'SELECT d.*,concat(h.address,", ",h.city,", ",h.zip) as address,c.clientname FROM documents d, houses h, clients c  ';
	$sql .= 'WHERE h.company = ? and h.username = ? and h.id = d.housesid and c.id = h.relation and d.housesid = ?';
	$sql .= 'ORDER BY d.id DESC';
        $result = $this->db->exec($sql,array($company,$id,$userid));
        return $result;
    }

    public function apihouselist($id) {
        // Selecting data
        $sql  = 'SELECT id,address ';
        $sql .= 'FROM houses WHERE relation = ?';
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
