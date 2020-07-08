<?php

class DowntimeController extends Controller {

    private $viewFolder = "downtime";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new Downtime($this->db);
        $this->f3->set('sqldata',$classvar->all($this->f3->get('PARAMS.id')));
        $this->f3->set('relation',$this->f3->get('PARAMS.id') );
        $this->f3->set('section','downtime');
        $this->f3->set('columns','[1,2]');
        $this->f3->set('mode','create');
        $this->f3->set('subnav','true');
        $this->f3->set('back','yes');
        $this->f3->set('backto','stations');
        $this->f3->set('create','no');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
    }

    public function apidowntime()
    {
        $classvar = new Downtime($this->db);
        $filter =  $this->f3->get('SESSION.company');
        $this->f3->set('ups',$classvar->apiproducts($filter) );
	    exit;    	// API Call to get data for popup
    }

    public function apidowntimefilter()
    {
        $classvar = new Downtime($this->db);
        $filter = $this->f3->get('PARAMS.filter');
        $id = $this->f3->get('PARAMS.id');
        $this->f3->set('ups',$classvar->apiscrapfilter($filter,$id) );
	    exit;    	// API Call to get data for popup
    }

    public function chart()
    {
	    $this->f3->set('page_head','Chart');
        $this->f3->set('json','sampleData');
	    $this->f3->set('view',$this->getViewFolder().'/chart.htm');
    }

    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $classvar = new Downtime($this->db);
            $classvar->add();
            $this->f3->reroute('/'.$this->getViewFolder()."/".$this->f3->get('POST.relation'));
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
        $classvar = new Downtime($this->db);

        if($this->f3->exists('POST.update'))
        {
            $classvar->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder()."/".$this->f3->get('POST.relation'));
        }
        else
        {
            // Getting data from SQL
            $classvar->getById($this->f3->get('PARAMS.id'));
            // Setting Form data
            $this->f3->set('page_head','Update');
            $this->f3->set('mode','update');
            $this->f3->set('relation',$this->f3->get('POST.relation'));
            // Setting List
            $this->f3->set('sqldata',$classvar->all($this->f3->get('POST.relation')));
            $this->f3->set('section','downtime');
            $this->f3->set('columns','[1,2]');
            $this->f3->set('subnav','true');
            $this->f3->set('back','yes');
            $this->f3->set('backto','stations');
            $this->f3->set('create','no');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new Downtime($this->db);
            // Getting relation ID from SQL
            $classvar->getById($this->f3->get('PARAMS.id'));
            // Deleting data from SQL
            $classvar->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder()."/".$this->f3->get('POST.relation'));
    }

} // main class

?>
