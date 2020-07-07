<?php

class Instructions extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'instructions');
    }

    public function all($id,$company) {
        // Selecting data
        $sql  = "SELECT @row:=@row+1 AS seq ,i.id, i.hows, i.whats, i.whys, i.sequence FROM instructions i, (SELECT @row:=0) r WHERE relation = ?  ORDER BY sequence";
        $result = $this->db->exec($sql,$id);
        return $result;
    }

    public function grid($id,$company) {
        // Selecting data
        $sql  = "SELECT i.id, i.hows, i.whats, i.whys, i.sequence, (SELECT internalfn FROM figures f ";
        $sql .= "WHERE i.id = f.relation ORDER BY f.id LIMIT 1) as internalfn, ";
        $sql .= "(SELECT COUNT(id) FROM figures f WHERE i.id = f.relation) AS figcount ";
        $sql .= "FROM instructions i   WHERE relation = ?";
        $result = $this->db->exec($sql,$id);
        return $result;
    }
    public function relation($id) {
        // Selecting data
        $sql  = 'SELECT relation FROM instructions WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['relation']; // Getting the relation number from the instructions
    }

    public function images($id,$user) {
        $sql = "SELECT @row:=@row+1 AS seq , f.relation, f.name, f.filename, f.internalfn FROM figures f, (SELECT @row:=0) r WHERE relation IN (SELECT id FROM instructions WHERE relation = ?) ORDER BY relation";
        $result = $this->db->exec($sql,$id);
        return $result;
    }

    public function breadcrumbs($id,$user) {
        // Selecting data
        $sql  = 'SELECT title,product,machine FROM stations_view1 WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['title'].' :: '.$result[0]['product'].' :: '.$result[0]['machine'];
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
