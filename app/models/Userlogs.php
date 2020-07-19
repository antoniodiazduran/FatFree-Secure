<?php

class Userlogs extends DB\SQL\Mapper {

    public function __construct(DB\SQL $d1) {
        parent::__construct($d1,'bpuserlog');
    }

    public function userEnable($code){
        $template=new Template;
        // Getting the relation number and the epoch number
        $sql  = "SELECT relation,epoch FROM bpuserlog WHERE secretcode = ?";
        $relation = $this->db->exec($sql,$code);
        $old = time() - $relation[0]['epoch']*1;
        echo $old;
        if( $old > 400) {
            $this->f3->set('msg','Validation code too old');
            $this->f3->set('stat','warning');
            echo $template->render('auth/error.htm');
        } else {
            $sql = "UPDATE bpuser SET verified = 1 WHERE id = ?";
            $update = $this->db->exec($sql,$relation[0]['relation']);
            $this->f3->set('msg','Username enabled');
            $this->f3->set('stat','success');
            $this->f3->set('view','/login');
        }
        
    }

    public function all($id) {
        $sql = "SELECT  * FROM bpuserlog u WHERE relation = ?";
        $result = $this->db->exec($sql,$id);
        return $result;
    }

    public function add($relation,$secretcode,$epoch) {
        $sql  = "INSERT INTO bpuserlog (relation, secretcode, epoch) ";
        $sql .= "VALUES (?,?,?)";
        return $this->db->exec($sql,array($relation,$secretcode,$epoch));
    }

    public function getById($id) {
        $this->load(array('relation=?',$id));
    }

}
?>
