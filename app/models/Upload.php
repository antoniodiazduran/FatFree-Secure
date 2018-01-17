<?php

class Upload extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'upfiles');
    }

    public function all($crit) {
        if ($crit!='') {
            $this->load(array('unit=?',$crit),array('order'=>'transdate DESC'));
        } else {
            $this->load(array('order'=>'transdate DESC'));
        }
        return $this->query;
        //$result = $this->db->exec('SELECT * FROM upfiles ORDER BY transdate DESC');
        //return $result;
    }

    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }

    public function upload($fn) {
        $overwrite = false; // set to true, to overwrite an existing file; Default: false
        $slug = true; // rename file to filesystem-friendly version
        $web = \Web::instance();
        $files = $web->receive(function($filename,$filetoupload){
                //var_dump($filename);
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
	$this->db->exec('INSERT INTO upfiles (transdate,filename,unit,area,sequence) VALUES (?,?,?,?,?)',array($fn['timestamp'],$filenm,$fn['unit'],$fn['area'],$fn['sequence']));
        }
        //$answer = array( 'answer' => 'Files transfer completed' );
        //$json = json_encode( $answer );
        //echo $json;
    }
}
?>
