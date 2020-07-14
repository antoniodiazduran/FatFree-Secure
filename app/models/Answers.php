<?php

class Answers extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'answers');
    }

    public function all($company) {
        // Selecting data
        if ($relation == 0) {
            $sql  = "SELECT * FROM audits ORDER BY title";
        } else {
            $sql  = "SELECT * FROM audits WHERE relation = ? ORDER BY title";
        }
        $result = $this->db->exec($sql,$company);
        return $result;
    }

    public function answers($relation) {
        // Selecting data
        //$sql  = "SELECT trainee,timestamp FROM answers WHERE relation = ? GROUP BY username,timestamp";
        $sql  = "SELECT * FROM answers WHERE relation = ?";
        $result = $this->db->exec($sql,$relation);
        return $result;
    }
    public function questions($relation) {
        // Selecting data
        $sql  = "SELECT * FROM questions WHERE relation = ?";
        $result = $this->db->exec($sql,$relation);
        return $result;
    }

    public function breadcrumbs($id) {
        // Selecting data
        $sql  = 'SELECT title FROM answers WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['title'];
        
    }


    public function add($forms) {
        // Creating SQL string
        $sql  = "INSERT INTO answers (relation,company,username,trainee,question,answer) VALUES";
        // Looping throught POST records from form
        forEach($forms as $key=>$value) {
            if(substr($key,0,1)=='a') {                                     // looking for answers only
                if(substr($key,0,1)=='a') { $key = substr($key,1,100); }    // Removing initial 'a' from form
                $ans = '';
                if(is_array($value)){
                    foreach($value as $k=>$v) {
                        $ans .= $v.",";    
                    }
                } else {
                    $ans .= $value;
                }
                $sql .= "(".$forms['relation'].",".$forms['company'].",'".$forms['username']."','".$forms['trainee']."',".$key.",'".$ans."'),";
            }
        }
        $sql = substr($sql,0,-1);           // Removing the las comma
        $this->db->exec($sql);              // Saving to database
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
