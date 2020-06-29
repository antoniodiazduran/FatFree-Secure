<?php

class Products extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'products');
    }

    public function all($company) {
        // Selecting data
        $sql  = "SELECT * FROM products_view1 ORDER BY company";
        $result = $this->db->exec($sql);
        return $result;
    }

    public function apiproducts($company) {
        // Selecting data
        $sql  = 'SELECT id,title FROM products WHERE company = ? ORDER BY title';
        $result = $this->db->exec($sql,$company);
        echo json_encode($result);
    }
    public function apiproductsfilter($filter,$id) {
        // Selecting data
        $sql  = 'SELECT id,title FROM products WHERE '.$filter.' = ? ORDER BY title';
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
