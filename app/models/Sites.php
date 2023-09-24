<?php

class Sites extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'sites');
    }

    public function all($company) {
        // Selecting data
        if ($company == 0) {
            $sql  = "SELECT s.id, c.name as company, s.username, s.city, s.state, s.country, s.description, s.transdate, s.timestamp ";
            $sql .= "FROM sites s LEFT JOIN company c ON s.company = c.id ORDER BY c.name";    
        $result = $this->db->exec($sql);
        } else {
            $sql  = "SELECT s.id, c.name as company, s.username, s.city, s.state, s.country, s.description, s.transdate, s.timestamp ";
            $sql .= "FROM sites s LEFT JOIN company c ON s.company = c.id WHERE s.company = ? ORDER BY s.city";
        $result = $this->db->exec($sql,$company);
        }
        return $result;
    }

    public function apisites() {
        // Selecting data
        $sql  = 'SELECT id,city FROM sites ORDER BY city';
        $result = $this->db->exec($sql);
        echo json_encode($result);
    }

    public function sitename($id) {
        // Selecting data
        $sql  = 'SELECT city FROM sites WHERE id  = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['city'];
    }

    public function apisitesfilter($filter,$id) {
        // Selecting data
        $sql  = 'SELECT id,city FROM sites WHERE '.$filter.' = ? ORDER BY city';
        $result = $this->db->exec($sql,$id);
        echo json_encode($result);
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
