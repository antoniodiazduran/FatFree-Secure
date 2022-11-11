<?php

class AgentsController extends Controller {

    private $viewFolder = "agents";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $agents = new Agents($this->db);
        $this->f3->set('sqldata',$agents->all($this->f3->get('SESSION.company'),$this->f3->get('SESSION.user'),$this->f3->get('SESSION.roles')));
        $this->f3->set('section','agents');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[2,3,4,5,6,7,8]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
    }

    public function apigetentlist()
    {
        $classvar = new Agents($this->db);
        $id = $this->f3->get('SESSION.user');
        $this->f3->set('ups',$classvar->apiagentlist($id) );
            exit;       // API Call to get data for popup
    }
    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $agents = new Agents($this->db);
            $agents->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
	   if($this->f3->get('SESSION.roles')=='Superuser'){
              $this->f3->set('section','agents');
              $this->f3->set('page_head','New');
              $this->f3->set('mode','create');
              $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
	   } else {
              $this->f3->reroute('/'.$this->getViewFolder());
           }
        }
    }

    public function update()
    {
        $agents = new Agents($this->db);

        if($this->f3->exists('POST.update'))
        {
            $agents->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $agents->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('section','agents');
	    $this->f3->set('mode','update');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $agents = new Agents($this->db);
            $agents->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
