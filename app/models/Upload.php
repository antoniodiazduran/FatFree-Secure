<?php

class Upload extends DB\SQL\Mapper {

    public function __construct(DB\SQL $d1) {
        parent::__construct($d1,'upfiles');
    }

    public function all($roles,$user) {
        if ($roles!='Admin') {
            $this->load(array('username=?',$user),array('order'=>'id DESC'));
        } else {
            $this->load(array('order'=>'transdate DESC'));
        }
        return $this->query;
    }
    public function receipts($user) {
        $sql  = 'SELECT id,area,filename FROM upfiles WHERE username = ? AND (isnull(expense) or expense = 0 )  ORDER BY transdate DESC';
        $result = $this->db->exec($sql, $user);
//	var_dump( json_encode($result) );
	echo json_encode($result);
    }
    public function receiptsedit($id) {
        $sql  = 'SELECT id,area,filename FROM upfiles WHERE expense = 0 or expense = ?' ;
        $result = $this->db->exec($sql, $id);
	//var_dump( json_encode($result) );
	echo json_encode($result);
    }

    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
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

    public function upload($fn,$user) {
        $overwrite = false; // set to true, to overwrite an existing file; Default: false
        $slug = true; // rename file to filesystem-friendly version
        $web = \Web::instance();
        $files = $web->receive(function($filename,$filetoupload){
                /* looks like:
                  array(5) {
                      ["name"] =>     string(19) "csshat_quittung.png"
                      ["type"] =>     string(9) "image/png"
                      ["tmp_name"] => string(14) "/tmp/php2YS85Q"
                      ["error"] =>    int(0)
                      ["size"] =>     int(172245)
                    }
                */
                // $file['name'] already contains the slugged name now
                // maybe you want to check the file size
                if($filename['size'] > (2 * 1024 * 1024)) // if bigger than 2 MB
                    return false; // this file is not valid, return false will skip moving it

                // everything went fine, hurray!
                return true; // allows the file to be moved from php tmp dir to your defined upload dir
            },
            $overwrite,
            $slug
        );

        //var_dump($files);
        //$files will contain all the files uploaded, in your case 1 hence $files[0];
	$str1 = json_encode($files);
	$str1 = str_replace('{"','',$str1);
	$str1 = str_replace('"','',$str1);
	$str1 = str_replace('uploads\/','',$str1);
        list($filenm,$action) = explode(":",$str1);
	if($action!=false) {
  	  // Adding data to the database
	  $sql  = 'INSERT INTO upfiles (filename,customer,area,internalfn,username) ';
 	  $sql .= 'VALUES (?,?,?,?,?) ';
	  $this->db->exec($sql,array( $filenm,$fn['customer'],$fn['area'],$this->getGUID(),$user ) );
        }
        //$answer = array( 'answer' => 'Files transfer completed' );
        //$json = json_encode( $answer );
        //echo $json;
    }

}
?>
