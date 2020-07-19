<?php

  class LoginController extends Controller{
    function render(){
        $this->f3->set('SESSION.user', null);
        $this->f3->set('SESSION.company', null);
	    $this->f3->set('msg','Weather in SC is HOT!');
	    $this->f3->set('stat','dark');
        $template=new Template;
        echo $template->render('auth/login.htm');
    }

    function enable(){
        $logs = new Userlogs($this->d1);
        $code = $this->f3->get('PARAMS.code');
        $logs->userEnable($code);
    }

    function error() {
	if ($this->f3->get('SESSION.user')!='') {
	    $this->f3->set('msg','Hmmm... have you been drinking?');
	    $this->f3->set('view','/auth/internalerror.htm');
	} else {
        $template=new Template;
	    $this->f3->set('msg','Are you lost or something?');
        echo $template->render('auth/error.htm');
	}
    }

    function signin() {
	    $this->f3->set('SESSION.user', null);
        $this->f3->set('SESSION.company', null);
        $template=new Template;
        echo $template->render('auth/create.htm');
    }

    function create() {
        if($this->f3->exists('POST.create')) {
             // Connecting to users to save data
             $newuser = new Users($this->d1);
             // Enabling mail function, creating guid code and save epoch time
             $sMail = new Controller;
             $code = $sMail->guid();
             date_default_timezone_set('America/New_York');
             $epoch = time();
             // Creating encrypted password
             $hash = password_hash($this->f3->get('POST.password'),PASSWORD_DEFAULT);
             $this->f3->set('POST.password',$hash);
             // Adding data to table bpuser
             $newuser->add();
             
             // Getting username information
             $user = new Login($this->d1);
             $company = new Company($this->d1);
             
             // Sending email to user
             $user->getByName($this->f3->get('POST.username'));
             $company->getByName($user->company);

             // Creatign email message
             $msg  = "<h3>Welcome to Infoman systems</h3>";
             $msg .= 'Your new username is: '.$user->username.'<br/>';
             $msg .= 'It was granted for the '.$user->roles.' area <br/>';
             $msg .= '<p/>';
             $msg .= '<hr> Click on the link below to enable your account in the system <br/>';
             $msg .= 'http://34.70.44.101/bpval/'.$code;

             // Saving userlog to verify
             $userlog = new Userlogs($this->d1);
             $userlog->add($user->id,$code,$epoch);

             // Checking for empty email
             $mailsent = 1;
             if($user->email != '') {
                 // Sending email via msmtprc
                 $mailsent = $sMail->sendMail($user->email,$msg);    
             }
             if ($mailsent == 0) {
                $this->f3->set('msg','Username and Password Created, please check your email to enable your account');
                $this->f3->set('stat','success');
             } else {
                $this->f3->set('msg','Mail not sent, please check with the system administrator');
                $this->f3->set('stat','danger');
             }
            
        }
            $template=new Template;
            echo $template->render('auth/login.htm');
    }

    function create_old() {
	if($this->f3->exists('POST.create')) {
        $ints = new Users($this->d1);
        $hash = password_hash($this->f3->get('POST.password'),PASSWORD_DEFAULT);
        $this->f3->set('POST.password',$hash);
        $ints->add();
	    $this->f3->set('msg','Username and Password Created!');
	    $this->f3->set('stat','success');
	}
        $template=new Template;
        echo $template->render('auth/login.htm');
    }

    function validate() {
        echo "validate";
        exit;
    }
    function checkusername() {
    	$user = new Login($this->d1);
	    $user->checkusername($this->f3->get('PARAMS.id'));
	    echo $user;
	    exit;
    }

    function beforeroute(){
        // refresh timer on every click
        //$this->f3->set('SESSION.timeout', time()+$this->f3->get('expire'));
    }

    function logout() {
            $this->f3->set('SESSION.user', null);
            $this->f3->set('SESSION.company', null);
            $this->f3->reroute('/login');
    }

    function authenticate() {
        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');
        $user = new Login($this->d1);
        $company = new Company($this->d1);
        // Getting user information
        $user->getByName($username);
        if($user->dry()==1) {
            // Username not founf
            $this->f3->set('msg','Username not found');
            $this->f3->set('stat','warning');
            $template=new Template;
            echo $template->render('auth/login.htm');
        } else {
            // Getting company name
            $company->getByName($user->company);
            if($user->verified == 1) {
                    //echo $user->username;
                    //echo $user->roles;
                    //$pass = password_hash($password,PASSWORD_DEFAULT);
                    //echo $pass;
                    //exit;
                if(password_verify($password, $user->password)) {
                
                    date_default_timezone_set('America/New_York');
                    $sMail = new Controller;
                    $datetime = new DateTime();
                    $timezone = new DateTimeZone('America/New_York');
                    $datetime->setTimezone($timezone);
                    $zone = $datetime->format('T');
                

                    $this->f3->set('SESSION.user', $user->username);
                    $this->f3->set('SESSION.roles', $user->roles);
                    $this->f3->set('SESSION.company', $user->company);
                    $this->f3->set('SESSION.companyname', $company->name);
                    $this->f3->set('SESSION.ip', $this->f3->ip());
                    $this->f3->set('SESSION.timeout', time()+$this->f3->get('expire'));
                    $this->f3->set('SESSION.timeoutdate',date('Y.m.d h:i:s',time()+$this->f3->get('expire')) );
                    $this->f3->set('SESSION.timezone', $zone);
                    $this->f3->set('company',$user->company);
                    $this->f3->set('stat','success');
                    $this->f3->set('msg','Welcome!');
                    $this->f3->set('view','main.htm');                    
                } else {
                    $this->f3->set('stat','danger');
                    $this->f3->set('msg','Incorrect Username & Password');
                    // Rendering 
                    $template=new Template;
                    echo $template->render('auth/login.htm');    
                }
            } else {
                $this->f3->set('stat','warning');
                $this->f3->set('msg','User not verified!');
                // Rendering 
                $template=new Template;
                echo $template->render('auth/login.htm'); 
            }
        }
    }
  }

?>
