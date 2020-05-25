<?php

class Ints extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'ints');
    }

    public function all($crit) {
        //if ($crit=='') {
        //    $this->load(array(),array('order'=>'timestamp DESC'));
        //} else {
        //    $this->load(array('order'=>'timestamp DESC'));
        //}
        //return $this->query;
        $result = $this->db->exec('SELECT * FROM ints WHERE unit = ? ORDER BY transdate DESC',$crit);
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

    public function chartStr() {
        $javascriptText = "";
        $result = $this->db->exec('SELECT id,unit,project,customer,platform,location,strDate,hwtDate,rftDate,progress FROM sims ORDER BY hwtDate DESC');
        foreach($result as $row) {
            $javascriptText .= "['" . $row['id'] ."','". $row['project'] ."/". $row['location'] ."','". $row['customer'] . "',new Date(" . substr($row['strDate'],0,4) . ",";
            $javascriptText .= substr($row['strDate'],5,2)*1-1 . "," . substr($row['strDate'],8,2)*1 . "),new Date(" . substr($row['hwtDate'],0,4) . ",";
            $javascriptText .= substr($row['hwtDate'],5,2)*1-1 . "," . substr($row['hwtDate'],8,2)*1 . "), null, " . $row['progress'] . ", null]," ;
        }
        $javascriptText.substr($javascriptText,0,$javascriptText.length-2);
        return $javascriptText;
    }
}
?>
