<?php

class ClockController extends Controller {

    private $viewFolder = "clocktime";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $clocktime = new Clocktime($this->db);
        $this->f3->set('sqldata',$clocktime->all($this->f3->get('SESSION.company')));
        $this->f3->set('section','clocktime');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[3,4]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
    }

    public function delete()
    {       
        if($this->f3->exists('PARAMS.rid'))
        {
            $clocktime = new Clocktime($this->db);
            $clocktime->delete($this->f3->get('PARAMS.rid'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
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
            $clocktime = new Clocktime($this->db);
            $clocktime->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $this->f3->set('page_head','clock');
            $this->f3->set('view','/'.$this->getViewFolder().'/create.htm');
        }
    }

    public function update()
    {
        $clocktime = new Clocktime($this->db);

        if($this->f3->exists('POST.update'))
        {
            $clocktime->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $clocktime->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','clock');
            $this->f3->set('view',$this->getViewFolder().'/update.htm');
        }
    }

} // main class

?>
