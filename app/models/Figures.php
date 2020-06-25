<?php

class Figures extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'figures');
    }

    public function all($id,$user) {
        // Selecting data
        $sql  = 'SELECT * FROM figures WHERE relation = ? ORDER BY timestamp DESC';
        $result = $this->db->exec($sql,$id);
        return $result;
    }

    public function relation($id) {
        // Selecting data
        $sql  = 'SELECT relation FROM instructions WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['relation']; // Getting the relation number from the instructions
    }

    public function figrelation($id) {
        // Selecting data
        $sql  = 'SELECT relation FROM figures WHERE id = ? ';
        $result = $this->db->exec($sql,$id);
        return $result[0]['relation']; // Getting the relation number from the instructions
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

    public function upload($fn,$user) {
        $errors = [];
        $extension = end(explode('.',$_FILES['filetoupload']['name']));     // Extracting the extension of the original filename
        $fn['filename'] = $_FILES['filetoupload']['name'];                  // Savng the original uploaded filename 
        $_FILES['filetoupload']['name'] = $this->getGUID().".".$extension; 	// Changing the original file to UUID + .pics
        $overwrite = false; 						                        // set to true, to overwrite an existing file; Default: false
        $slug = false; 							                            // rename file to filesystem-friendly version
        $web = \Web::instance();
        $files = $web->receive(function($filename,$filetoupload){
                // maybe you want to check the file size
                if($filename['size'] > (4 * 1024 * 1024))  	                // if bigger than 2 MB
                    return false; 				                            // this file is not valid, return false will skip moving it
    
                // everything went fine, hurray!
                return true; // allows the file to be moved from php tmp dir to your defined upload dir
            },
            $overwrite,
            $slug
        );
            //$files will contain all the files uploaded, in your case 1 hence $files[0];
            if($_FILES['filetoupload']['size'] > (4 * 1024 * 1024)) {  // if bigger than 4 MB
                $errors[] = "File too big!".$_FILES['filetoupload']['size']; 
        }
        foreach($files as $f => $k) {
            $k = strlen($k) == 0 ? false : true;
            //echo "k:".$k;
            if($k) {
                // Adding data to the database
                $sql  = 'INSERT INTO figures (name,relation,filename,internalfn,username) ';
                $sql .= 'VALUES (?,?,?,?,?) ';
                $this->db->exec($sql,array( $fn['name'], $fn['relation'], $fn['filename'],$f,$user ) );
            } else {
                $errors[] = $fn['filename']. ' file not uploaded!';
            }
         }
            return json_encode($errors);
        }
    
    public function getGUID(){
        // Generating numbers
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
?>
