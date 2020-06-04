<?php

class ExpController extends Controller {

    private $viewFolder = "expenses";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $expenses = new Expenses($this->db);
        $this->f3->set('expenses',$expenses->all($this->f3->get('SESSION.user')));
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
            $expenses = new Expenses($this->db);
            $expenses->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $this->f3->set('page_head','New');
            $this->f3->set('view','/'.$this->getViewFolder().'/create.htm');
        }
    }

    public function update()
    {
        $expenses = new Expenses($this->db);

        if($this->f3->exists('POST.update'))
        {
            $expenses->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $expenses->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('view',$this->getViewFolder().'/update.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $expenses = new Expenses($this->db);
            $expenses->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>