<?php

  class LoginController extends Controller{
    function render(){
        $this->f3->set('SESSION.user', null);
        $this->f3->set('SESSION.company', null);
	    $this->f3->set('msg','Diaz Consulting, LLC');
	    $this->f3->set('stat','dark');
        $template=new Template;
        echo $template->render('auth/login.htm');
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
        $company = new Login($this->d1);
        // Getting user information
        $user->getByName($username);

        // Getting company name
        $cid = $company->companyName($user->company);

        if($user->dry()) {
            //$this->f3->set('msg','Username & Password not matching');
            //$this->f3->set('stat','warning');
            //$this->f3->set('view','login.htm');
        } 

        //echo $user->username;
        //echo $user->roles;
        //$pass = password_hash($password,PASSWORD_DEFAULT);
        //echo $pass;
        //exit;

        if(password_verify($password, $user->password)) {
        
            date_default_timezone_set('America/New_York');
            $datetime = new DateTime();
            $timezone = new DateTimeZone('America/New_York');
            $datetime->setTimezone($timezone);
            $zone = $datetime->format('T');
        

            $this->f3->set('SESSION.user', $user->username);
            $this->f3->set('SESSION.roles', $user->roles);
            $this->f3->set('SESSION.company', $user->company);
            $this->f3->set('SESSION.companyname', $cid[0]['name']);
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
            //$this->f3->reroute('/login');
            $template=new Template;
            echo $template->render('auth/login.htm');
        }
    }
  }

?>
