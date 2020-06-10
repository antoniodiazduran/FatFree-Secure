<?php

class DetailsController extends Controller {

    private $viewFolder = "invoices";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new Details($this->db);
        $this->f3->set('details',$classvar->all($this->f3->get('SESSION.user')));
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/details.htm');
    }

    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $classvar = new Details($this->db);
            $classvar->add();
        }
        else
        {
            $this->f3->set('page_head','New');
        }
        $this->f3->reroute('/'.$this->getViewFolder().'/details/'.$this->f3->get('POST.rid'));
    }

    public function update()
    {
        $classvar = new Details($this->db);

        if($this->f3->exists('POST.update'))
        {
            $classvar->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $classvar->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('view',$this->getViewFolder().'/update.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new Details($this->db);
	    $rid = $classvar->getRid($this->f3->get('PARAMS.id'));
            $classvar->delete($this->f3->get('PARAMS.id'));
        }
        $this->f3->reroute('/'.$this->getViewFolder().'/details/'.$rid[0]['relation']);

        //$this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
