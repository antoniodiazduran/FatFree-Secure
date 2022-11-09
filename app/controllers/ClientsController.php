<?php

class ClientsController extends Controller {

    private $viewFolder = "clients";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $clients = new Clients($this->db);
        $this->f3->set('sqldata',$clients->all($this->f3->get('SESSION.company'),$this->f3->get('SESSION.user')));
        $this->f3->set('section','clients');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[2,3,4,5,6,7,8]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
    }

    public function houses()
    {
        $clients = new Clients($this->db);
        $this->f3->set('sqldata',$clients->houses($this->f3->get('SESSION.company'),$this->f3->get('PARAMS.id')));
        $this->f3->set('clientname',$clients->clientname($this->f3->get('SESSION.company'),$this->f3->get('PARAMS.id')));
        $this->f3->set('section','houses');
        $this->f3->set('subnav','true');
        $this->f3->set('back','yes');
	$this->f3->set('create','false');
        $this->f3->set('backto','clients' );
	$this->f3->set('columns','[2,3,4,5,6,7,8]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/houses.htm');
    }

    public function apiclientlist()
    {
        $classvar = new Clients($this->db);
        $id = $this->f3->get('SESSION.user');
        $this->f3->set('ups',$classvar->apiclientlist($id) );
            exit;       // API Call to get data for popup
    }
    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $clients = new Clients($this->db);
            $clients->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $this->f3->set('section','clients');
            $this->f3->set('page_head','New');
	    $this->f3->set('mode','create');
            $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function update()
    {
        $clients = new Clients($this->db);

        if($this->f3->exists('POST.update'))
        {
            $clients->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $clients->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('section','clients');
	    $this->f3->set('mode','update');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $clients = new Clients($this->db);
            $clients->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
