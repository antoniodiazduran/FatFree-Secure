<?php

class Stations extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'stations');
    }

    public function all($company) {
        // Selecting data
        if ($company == 0) {
            $sql  = 'SELECT * FROM stations_view3 ORDER BY timestamp DESC';
        } else {
	$sql  = 'SELECT *, ';
        $sql .= '(select count(id) from scrap s where s.relation = v.id) as defect, ';
        $sql .= '(select count(id) from downtime d where d.relation = v.id) as delay, ';
        $sql .= '(select count(id) from rework d where d.relation = v.id) as rework ';
        $sql .= 'FROM stations_view3 v WHERE company = ? ORDER BY site,product,machine,title';
	}
        $result = $this->db->exec($sql,$company);
        return $result;
    }

    public function apistationsfilter ($tab,$fld,$id) { 
        // Selecting data
	if ($tab == 'scrap') {
          $sql  = 'SELECT a.id,a.reason as title from '.$fld.' a WHERE a.relation = ? ORDER BY a.reason';
	} else {
	  if ($tab != 'station') {
          $sql  = 'SELECT a.id,a.title from '.$tab.'s a WHERE a.id in (SELECT '.$tab.' FROM stations s WHERE '.$fld.' = ?) ORDER BY a.title';
	  } else {
          $sql  = 'SELECT a.id,a.title from '.$tab.'s a WHERE a.product = '.$fld.' and a.machine = ? ORDER BY a.title';
	  }
	}
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
