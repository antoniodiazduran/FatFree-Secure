<?php

class CompanyController extends Controller {

    private $viewFolder = "company";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new Company($this->db);
        $this->f3->set('sqldata',$classvar->all($this->f3->get('SESSION.company')));
        $this->f3->set('section','company');
        $this->f3->set('columns','[1,2]');
        $this->f3->set('mode','create');
        $this->f3->set('subnav','true');
        $this->f3->set('back','');
        $this->f3->set('backto','company');
        $this->f3->set('create','no');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
    }

    public function apisites()
    {
        $classvar = new Company($this->db);
        $usr =  $this->f3->get('SESSION.user');
        $this->f3->set('ups',$classvar->apisites($usr) );
	    exit;    	// API Call to get data for popup
    }

    public function chart()
    {
	    $this->f3->set('page_head','Chart');
        $this->f3->set('json','sampleData');
	    $this->f3->set('view',$this->getViewFolder().'/chart.htm');
    }

    public function apicompany()
    {
        $classvar = new Company($this->db);
        $this->f3->set('ups',$classvar->apicompany() );
	    exit;    	// API Call to get data for popup
    }

    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $classvar = new Company($this->db);
            $classvar->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $this->f3->set('page_head','New');
	        $this->f3->set('mode','create');
            $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function update()
    {
        $classvar = new Company($this->db);

        if($this->f3->exists('POST.update'))
        {
            $classvar->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $classvar->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('sqldata',$classvar->all($this->f3->get('SESSION.user')));
            $this->f3->set('page_head','Update');
            $this->f3->set('section','company');
            $this->f3->set('columns','[1,2]');
            $this->f3->set('subnav','true');
            $this->f3->set('back','');
            $this->f3->set('backto','company');
            $this->f3->set('create','no');
            $this->f3->set('page_head','List');
	        $this->f3->set('mode','update');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new Company($this->db);
            $classvar->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
