<?php

class AppointmentsController extends Controller {

    private $viewFolder = "appointments";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $appointments = new Appointments($this->db);
        $this->f3->set('sqldata',$appointments->all($this->f3->get('SESSION.company'),$this->f3->get('SESSION.user')));
        $this->f3->set('section','appointments');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[2,3,4,5,6,7,8]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
    }

    public function apiappointmentslist()
    {
        $classvar = new Appointments($this->db);
        $id = $this->f3->get('SESSION.user');
        $this->f3->set('ups',$classvar->apiclientlist($id) );
            exit;       // API Call to get data for popup
    }

    public function create()
    {
       $agents = new Agents($this->db);
        if($this->f3->exists('POST.create'))
        {
            $appointments = new Appointments($this->db);
            $appointments->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $this->f3->set('section','appointments');
            $this->f3->set('agents',$agents->apiagentlist());
            $this->f3->set('page_head','New');
	    $this->f3->set('mode','create');
            $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function update()
    {
       $appointments = new Appointments($this->db);
       $agents = new Agents($this->db);

        if($this->f3->exists('POST.update'))
        {
            $appointments->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $appointments->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('agents',$agents->apiagentlist());
            $this->f3->set('section','appointments');
	    $this->f3->set('mode','update');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $appointments = new Appointments($this->db);
            $appointments->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
