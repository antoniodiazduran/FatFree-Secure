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
        $this->f3->set('sqldata',$expenses->all($this->f3->get('SESSION.company')));
        $this->f3->set('section','expenses');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[2,3,8]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
    }

    public function apiexpensesdetail()
    {
        $classvar = new Expenses($this->db);
        $id = $this->f3->get('PARAMS.id');
        $this->f3->set('ups',$classvar->apiexpensesdetail($id) );
            exit;       // API Call to get data for popup
    }

    public function apiexpensesfilter()
    {
        $classvar = new Expenses($this->db);
        $customer = $this->f3->get('PARAMS.filter');
	$company = $this->f3->get('SESSION.company');
        $this->f3->set('ups',$classvar->apiexpensesfilter($customer,$company) );
            exit;       // API Call to get data for popup
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
	    $this->f3->set('mode','create');
            $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
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
	    $this->f3->set('mode','update');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
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
