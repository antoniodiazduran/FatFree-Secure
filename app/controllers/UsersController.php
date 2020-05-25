<?php

class UsersController extends Controller {

    public function index()
    {
        $ints = new Users($this->d1);
        $this->f3->set('users',$ints->all(''));
        $this->f3->set('page_head','List');
        $this->f3->set('view','users/list.htm');
    }
    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $ints = new Users($this->d1);
	    $hash = password_hash($this->f3->get('POST.password'),PASSWORD_DEFAULT);
	    $this->f3->set('POST.password',$hash);
            $ints->add();
            $this->f3->reroute('/users');
        }
        else
        {
            $this->f3->set('page_head','New');
            $this->f3->set('view','/users/create.htm');
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
            $this->f3->set('page_head','Update');
            $this->f3->set('view','users/update.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $ints = new Users($this->d1);
            $ints->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/users');
    }

} // main class

?>
