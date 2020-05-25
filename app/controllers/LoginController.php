<?php

  class LoginController extends Controller{
    function render(){
        $this->f3->set('SESSION.user', null);
        $this->f3->set('SESSION.bp_id', null);
        $template=new Template;
        echo $template->render('auth/login.htm');
    }

    function beforeroute(){
    }
    
    function logout() {
            $this->f3->set('SESSION.user', null);
            $this->f3->set('SESSION.bp_id', null);
            $this->f3->reroute('/login');
    }

    function authenticate() {

        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');

        $user = new Login($this->d1);
        $user->getByName($username);


        if($user->dry()) {
            $this->f3->reroute('/login');
        } 

//echo $user->username;
//echo $user->roles;
//$pass = password_hash($password,PASSWORD_DEFAULT);
//echo $pass;
//exit;

        if(password_verify($password, $user->password)) {
	    $datetime = new DateTime();
	    $zone = $datetime->format('T');
            $this->f3->set('SESSION.user', $user->username);
            $this->f3->set('SESSION.roles', $user->roles);
            $this->f3->set('SESSION.bp_id', $user->bp_id);
            $this->f3->set('SESSION.ip', $this->f3->ip());
            $this->f3->set('SESSION.timeout', time()+$this->f3->get('expire'));
	    $this->f3->set('SESSION.timezone', $zone);
	    $this->f3->set('bpid',$user->bp_id);
	    $this->f3->set('stat','success');
	    $this->f3->set('msg','Welcome!!');
            $this->f3->set('view','main.htm');
        } else {
            $this->f3->reroute('/login');
        }
    }
  }

?>
