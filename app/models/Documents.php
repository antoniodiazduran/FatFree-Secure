<?php

class Documents extends DB\SQL\Mapper {

    public function __construct(DB\SQL $d1) {
        parent::__construct($d1,'documents');
    }

    public function all($roles,$company,$id) {
        if ($roles!='Admin') {
	    $sql  = 'SELECT d.*,h.address,c.clientname FROM documents d, houses h, clients c  WHERE h.company = ? and h.id = d.housesid and c.id = h.relation ORDER BY id DESC';
            $result = $this->db->exec($sql,array($company));
        } else {
	    $sql  = 'SELECT * FROM documents d, houses h WHERE h.relation = c.id ORDER BY id DESC';
            $result = $this->db->exec($sql);
            $this->load(array('order'=>'transdate DESC'));
        }
        return $result;
    }

    public function allid($company,$id,$cid) {
	    $sql  = 'SELECT h.*,c.id as clientid, c.clientname FROM houses h, clients c WHERE h.company = ? and h.relation = c.id ORDER BY id DESC';
            $result = $this->db->exec($sql,array($id,$cid));
            return $result;
    }

    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }

    public function upload($fn) {
	$errors = [];
	$extension = end(explode('.',$_FILES['filetoupload']['name']));
	$_FILES['filetoupload']['name'] = $fn['internal'].".".$extension; 	// Changing the original file to UUID + .pics
        $overwrite = false; 						// set to true, to overwrite an existing file; Default: false
        $slug = false; 							// rename file to filesystem-friendly version
        $web = \Web::instance();
        $files = $web->receive(function($filename,$filetoupload){
                // maybe you want to check the file size
                if($filename['size'] > (4 * 1024 * 1024))  	// if bigger than 2 MB
		   return false; 				// this file is not valid, return false will skip moving it
               // everything went fine, hurray!
                return true; // allows the file to be moved from php tmp dir to your defined upload dir
            },
            $overwrite,
            $slug
        );
	//var_dump($files);
        //$files will contain all the files uploaded, in your case 1 hence $files[0];
        if($_FILES['filetoupload']['size'] > (4 * 1024 * 1024)) {  // if bigger than 4 MB
        	$errors[] = "File too big!".$_FILES['filetoupload']['size']; 
	}
	foreach($files as $f => $k) {
		$k = strlen($k) == 0 ? false : true;
		//echo "k:".$k;
		if($k) {
  	  		// Adding data to the database
	  		$sql  = 'INSERT INTO documents (transdate,filename,housesid,internalfn,username,company) ';
 	  		$sql .= 'VALUES (?,?,?,?,?,?) ';
	  		//$this->db->exec($sql,array( $fn['transdate'],$fn['filename'],$fn['customer'],$fn['area'],$this->getGUID(),$user ) );
 		$this->db->exec($sql,array( $fn['transdate'],$fn['filename'],$fn['housesid'],substr($f,8,200),$fn['username'],$fn['company'] ) );
			$nid = $this->db->lastInsertId();
        	} else {
			$errors[] = $fn['filename']. ' file not uploaded!';
		}
 	}
        return json_encode($errors);
    }

    function getGUID(){
      if (function_exists('com_create_guid')){
        return com_create_guid();
      }else{
        mt_srand((double)microtime()*10000);			//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);					// "-"
  	//$uuid = chr(123)					// "{"
	$uuid = ""
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);
        //    .chr(125);					// "}"
        return $uuid;
      }
    }


}
?>
