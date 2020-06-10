<?php

class Invoices extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'invoices');
    }

    public function all($user) {
        $sql  = 'SELECT *, (select sum(total) from invoicesd where relation = invoices.id) as total FROM invoices WHERE username = ? ORDER BY transdate DESC';
        $result = $this->db->exec($sql,$user);
        return $result;
    }
    public function allid($id) {
        $sql  = 'SELECT *, (select sum(total) from invoicesd where relation = invoices.id) as total FROM invoices WHERE id = ?';
        $result = $this->db->exec($sql,$id);
        return $result;
    }

    public function details($id) {
        $sql  = 'SELECT * FROM invoicesd WHERE relation = ? ORDER BY transdate DESC';
        $result = $this->db->exec($sql,$id);
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
