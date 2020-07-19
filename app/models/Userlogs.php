<?php

class Userlogs extends DB\SQL\Mapper {

    public function __construct(DB\SQL $d1) {
        parent::__construct($d1,'bpuserlog');
    }

    public function all($id) {
        $sql = "SELECT  * FROM bpuserlog u WHERE relation = ?";
        $result = $this->db->exec($sql,$id);
        return $result;
    }

    public function add($relation,$secretcode,$epoch) {
        $sql  = "INSERT INTO bpuserlog (relation, secretcode, epoch) ";
        $sql .= "VALUES (?,?,?)";
        echo $relation.' '.$secretcode.' '.$epoch;
        return $this->db->exec($sql,array($relation,$secretcode,$epoch));
    }

    public function getById($id) {
        $this->load(array('relation=?',$id));
    }

}
?>
