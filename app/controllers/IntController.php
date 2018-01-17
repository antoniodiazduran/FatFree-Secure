<?php

class IntController extends Controller {

    public function index()
    {
        $ints = new Ints($this->db);
        $this->f3->set('ints',$ints->all('M+V'));
        $this->f3->set('page_head','List');
        $this->f3->set('view','int/list.htm');
    }

    public function chart()
    {
	$this->f3->set('page_head','Chart');
        $this->f3->set('json','sampleData');
	$this->f3->set('view','int/chart.htm');
    }

    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $ints = new Ints($this->db);
            $ints->add();
            $this->f3->reroute('/int');
        }
        else
        {
            $this->f3->set('page_head','New');
            $this->f3->set('view','/int/create.htm');
        }
    }

    public function update()
    {
        $ints = new Ints($this->db);

        if($this->f3->exists('POST.update'))
        {
            $ints->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/int');
        }
        else
        {
            $ints->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('view','int/update.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $ints = new Ints($this->db);
            $ints->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/int');
    }

} // main class

?>
