<?php

class Controller {

    protected $f3;
    protected $db;
    protected $d1;

    function beforeroute() {
      if ($this->f3->get('SECURE')) {
        if($this->f3->get('SESSION.user') === null ) {
          $this->f3->reroute('/login');
          exit;
        }
        if ( $this->f3->get('SESSION.timeout') < time() ) {
           $this->f3->set('SESSION.user', null);
           $this->f3->set('SESSION.bp_id', null);
           $this->f3->reroute('/login');
	         exit;
        }
          // Refresh timer on every click
          date_default_timezone_set('America/New_York');
          $this->f3->set('SESSION.timeout', time()+$this->f3->get('expire'));
          $this->f3->set('SESSION.timeoutdate',date('Y.m.d h:i:s',time()+$this->f3->get('expire')) );
      }
    }

    function afterroute() {
      if ($this->f3->get('SECURE')) {
        if($this->f3->get('SESSION.user') != null ) {
          if ( $this->f3->get('SESSION.ip') === $this->f3->ip() ) {
             //echo Template::instance()->render('layout.htm');
          } else {
	          echo "Session Terminated..".$this->f3->get('SESSION.ip');
	        }
        }
      } else {
        //echo Template::instance()->render('layout.htm');
      }
    }

    public function sendMail($to,$msg) {
      // In case any of our lines are larger than 70 characters, we should use wordwrap()
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      $msg = wordwrap($msg, 200, "<br/>");
      // Send - to, subject, message
      $bool = mail($to,'Infoman communications', $msg, $headers);
    }

    public function guid() {
      if (function_exists('openssl_random_pseudo_bytes') === true) {
              $data = openssl_random_pseudo_bytes(16);
              $data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // set version to 0100
              $data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // set bits 6-7 to 10
              return strtoupper(vsprintf('%s-%s-%s%s-%s-%s-%s%s', str_split(bin2hex($data), 4)));
      }
    }
    
    function __construct() {

        $f3=Base::instance();

        $db=new DB\SQL(
            $f3->get('db_dns') . $f3->get('db_name'),
            $f3->get('db_user'),
            $f3->get('db_pass')
        );
        $d1=new DB\SQL(
            $f3->get('d1_dns') . $f3->get('d1_name'),
            $f3->get('d1_user'),
            $f3->get('d1_pass')
        );

	$this->f3=$f3;
	$this->db=$db;
	$this->d1=$d1;
    }
}

?>
