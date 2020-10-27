<?php

class PeopleController extends Controller {

    private $viewFolder = "people";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new People($this->db);
        $this->f3->set('sqldata',$classvar->all($this->f3->get('PARAMS.id'),$this->f3->get('SESSION.company')));
        $this->f3->set('relation',$this->f3->get('PARAMS.id') );
        $this->f3->set('section','people');
        $this->f3->set('columns','[1,2,3]');
        $this->f3->set('mode','create');
        $this->f3->set('subnav','true');
        $this->f3->set('back','');
        $this->f3->set('backto','audits');
        $this->f3->set('create','no');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
    }

    public function apitrainee()
    {
        $classvar = new People($this->db);
        $tid = $this->f3->get('PARAMS.id');
        $this->f3->set('ups',$classvar->apitrainee($tid) );
	    exit;    	// API Call to get data for popup
    }

    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $classvar = new People($this->db);
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

    public function active() {
        $classvar = new People($this->db);
        $status = $classvar->status($this->f3->get('PARAMS.id'));
        if($status[0]['active']==1) {
            $classvar->active($this->f3->get('PARAMS.id'),0);
        } else {
            $classvar->active($this->f3->get('PARAMS.id'),1);
        }
        $this->f3->reroute('/'.$this->getViewFolder());
    }

    public function update()
    {
        $classvar = new People($this->db);

        if($this->f3->exists('POST.update'))
        {
            $classvar->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
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
            $this->f3->set('section','people');
            $this->f3->set('columns','[1,2]');
            $this->f3->set('subnav','true');
            $this->f3->set('back','yes');
            $this->f3->set('backto','audits');
            $this->f3->set('create','no');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new People($this->db);
            // Getting relation ID from SQL
            $classvar->getById($this->f3->get('PARAMS.id'));
            // Deleting data from SQL
            $classvar->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
