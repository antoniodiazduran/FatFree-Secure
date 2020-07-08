<?php

class Stations extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'stations');
    }

    public function all($company) {
        // Selecting data
        $sql  = 'SELECT *, ';
        $sql .= '(select count(id) from scrap s where s.relation = v.id) as defect, ';
        $sql .= '(select count(id) from downtime d where d.relation = v.id) as delay, ';
        $sql .= '(select count(id) from rework d where d.relation = v.id) as rework ';
        $sql .= 'FROM stations_view2 v WHERE company = ? ORDER BY timestamp DESC';
        $result = $this->db->exec($sql,$company);
        return $result;
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
