<?php

class AnswersController extends Controller {

    private $viewFolder = "answers";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new Answers($this->db);
        $this->f3->set('sqldata',$classvar->all($this->f3->get('SESSION.company')));
        $this->f3->set('section','answers');
        $this->f3->set('columns','[1,2]');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('backto','');
        $this->f3->set('create','no');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
    }
    public function audits()
    {
        $classvar = new Answers($this->db);
        $this->f3->set('sqldata',$classvar->answers($this->f3->get('PARAMS.id')));
        $this->f3->set('section','audits');
        $this->f3->set('columns','[1,2,3,4]');
        $this->f3->set('subnav','true');
        $this->f3->set('back','yes');
        $this->f3->set('backto','audits/list');
        $this->f3->set('create','no');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/audits.htm');
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
            $classvar = new Answers($this->db);
            $classvar->add($this->f3->get('POST'));
            $this->f3->reroute('/'.$this->getViewFolder().'/list/'.$this->f3->get('POST.relation'));
        }
        else
        {
            $classvar = new Answers($this->db);
            $this->f3->set('sqldata',$classvar->questions($this->f3->get('PARAMS.id')));
            $this->f3->set('relation',$this->f3->get('PARAMS.id'));
            $this->f3->set('section','answers');
            $this->f3->set('subnav','true');
            $this->f3->set('back','yes');
            $this->f3->set('backto','audits/list');
            $this->f3->set('create','no');
            $this->f3->set('search','no');
            $this->f3->set('page_head','New');
	        $this->f3->set('mode','create');
            $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function update()
    {
        $classvar = new Answers($this->db);

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
            $this->f3->set('section','answers');
            $this->f3->set('columns','[1,2]');
            $this->f3->set('subnav','true');
            $this->f3->set('back','yes');
            $this->f3->set('backto','answers');
            $this->f3->set('create','no');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new Answers($this->db);
            // Getting relation ID from SQL
            $classvar->getById($this->f3->get('PARAMS.id'));
            // Deleting data from SQL
            $classvar->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder()."/".$this->f3->get('POST.relation'));
    }

} // main class

?>
