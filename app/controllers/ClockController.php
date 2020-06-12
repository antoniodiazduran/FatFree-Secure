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
        $this->f3->set('clocktime',$clocktime->all($this->f3->get('SESSION.user')));
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
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

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $clocktime = new Clocktime($this->db);
            $clocktime->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
