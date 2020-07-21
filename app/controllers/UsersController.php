<?php

class UsersController extends Controller {

    public function index()
    {
        if ($this->f3->get('SESSION.roles') == 'Admin'){
            $ints = new Users($this->d1);
            $this->f3->set('users',$ints->all($this->f3->get('SESSION.company')));
            $this->f3->set('section','users');
            $this->f3->set('columns','[1,3,4,5]');
            $this->f3->set('subnav','true');
            $this->f3->set('page_head','List');
            $this->f3->set('view','users/list.htm');
        } else {
            $this->f3->reroute('/');
        }
        
    }
    public function create()
    {
        if ($this->f3->get('SESSION.roles') == 'Admin'){
            if($this->f3->exists('POST.create'))
            {
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
                $msg .= 'It was granted for the '.$user->roles.' area and <br/>';
                $msg .= 'assigned under company name : '.$company->name.'<p/>';
                $msg .= '<hr> Click on the link below to enable your account in the system <br/>';
                $msg .= 'http://35.209.35.43/bpval/'.$code;

                // Saving userlog to verify
                $userlog = new Userlogs($this->d1);
                $userlog->add($user->id,$code,$epoch);

                // Checking for empty email
                if($user->email != '') {
                    // Sending email via msmtprc
                    $sMail->sendMail($user->email,$msg);    
                }
                $this->f3->reroute('/users');
            }
            else
            {
                $this->f3->set('mode','create');
                $this->f3->set('subnav','true');
                $this->f3->set('back','yes');
                $this->f3->set('backto','users');
                $this->f3->set('create','no');
                $this->f3->set('search','no');    
                $this->f3->set('page_head','New');
                $this->f3->set('view','/users/create.htm');
            }
        } else {
            $this->f3->reroute('/');
        }
    }

    public function change()
    {
        $ints = new Users($this->d1);

        if($this->f3->exists('POST.change'))
        {
	        $data = $ints->getPass($this->f3->get('POST.id'));
            $hsh = $data[0]['password'];
	        $old = $this->f3->get('POST.pass0');
            if (password_verify($old,$hsh)) {
		        $hash = password_hash($this->f3->get('POST.pass2'),PASSWORD_DEFAULT);
		        $this->f3->set('POST.password',$hash);
            	$ints->edit($this->f3->get('POST.id'));
		        $this->f3->set('stat','success');
		        $this->f3->set('msg','Password! changed');
            	$this->f3->set('view','main.htm');
	        } else {
                $this->f3->set('stat','danger');
                $this->f3->set('msg','Wrong Password!');
                $this->f3->set('view','main.htm');
	        }
        }
        else
        {
            $ints->getByName($this->f3->get('SESSION.user'));
            $this->f3->set('page_head','Update');
            $this->f3->set('view','users/change.htm');
        }
    }

    public function update()
    {
        $ints = new Users($this->d1);

        if($this->f3->exists('POST.update'))
        {
            $ints->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/users');
        }
        else
        {
            $ints->getById($this->f3->get('PARAMS.id'));
	        $hash = password_hash($this->f3->get('POST.password'),PASSWORD_DEFAULT);
            $this->f3->set('hash',$hash);
            $this->f3->set('mode','update');
            $this->f3->set('subnav','true');
            $this->f3->set('back','yes');
            $this->f3->set('backto','users');
            $this->f3->set('create','no');
            $this->f3->set('search','no');
            $this->f3->set('page_head','Update');
            $this->f3->set('view','users/update.htm');
        }
    }

    public function delete()
    {
        if ($this->f3->get('SESSION.roles') == 'Admin'){
            if($this->f3->exists('PARAMS.id'))
            {
                $ints = new Users($this->d1);
                $ints->delete($this->f3->get('PARAMS.id'));
            }
            $this->f3->reroute('/users');
        } else {
            $this->f3->reroute('/');
        }
    }

} // main class

?>
