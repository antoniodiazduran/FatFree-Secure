<?php

class InvoicesController extends Controller {

    private $viewFolder = "invoices";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function print() {
        $classvar = new Invoices($this->db);
        $this->f3->set('details',$classvar->allid($this->f3->get('PARAMS.id')));
        $this->f3->set('invoicesd',$classvar->details($this->f3->get('PARAMS.id')));
	$this->f3->set('guid',$classvar->guid());
        $this->f3->set('page_head','print');
        $this->f3->set('view',$this->getViewFolder().'/print.htm');
    }

    public function details()
    {
        $classvar = new Invoices($this->db);
        $this->f3->set('details',$classvar->allid($this->f3->get('PARAMS.id')));
        $this->f3->set('invoicesd',$classvar->details($this->f3->get('PARAMS.id')));

        $this->f3->set('page_head','Details');
        $this->f3->set('view',$this->getViewFolder().'/details.htm');
    }

    public function index()
    {
        $classvar = new Invoices($this->db);
        $this->f3->set('invoices',$classvar->all($this->f3->get('SESSION.user')));
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
            $classvar = new Invoices($this->db);
            $classvar->add();
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
        $classvar = new Invoices($this->db);

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
            $classvar = new Invoices($this->db);
            $classvar->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
