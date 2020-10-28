<?php

class TrendsController extends Controller {

    private $viewFolder = "trends";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new Trends($this->db);
        $this->f3->set('sqldata',$classvar->all($this->f3->get('SESSION.company')));
        $this->f3->set('section','trends');
        $this->f3->set('subnav','false');
        $this->f3->set('back','no');
        $this->f3->set('backto','trends');
        $this->f3->set('columns','[0,1,2,3,4,5]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/test.htm');
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
            $classvar = new Trends($this->db);
            $classvar->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $this->f3->set('page_head','New');
            $this->f3->set('section','trends');
            $this->f3->set('subnav','true');
            $this->f3->set('back','yes');
            $this->f3->set('backto','trends');
            $this->f3->set('create','no');
            $this->f3->set('search','no');
            $this->f3->set('mode','create');
            $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function update()
    {
        $classvar = new Trends($this->db);

        if($this->f3->exists('POST.update'))
        {
            $classvar->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $classvar->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('subnav','true');
            $this->f3->set('back','yes');
            $this->f3->set('backto','trends');
            $this->f3->set('create','no');
            $this->f3->set('search','no');
	        $this->f3->set('mode','update');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new Trends($this->db);
            $classvar->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
