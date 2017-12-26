<?php

class ProdController extends Controller {

    public function index()
    {
        $prod = new Prod($this->db);
        $this->f3->set('prod',$prod->all(''));
        $this->f3->set('page_head','List');
        $this->f3->set('view','prod/list.htm');
    }
    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $prod = new Prod($this->db);
            $prod->add();
            $this->f3->reroute('/prod');
        }
        else
        {
            $this->f3->set('page_head','Create');
            $this->f3->set('view','/prod/create.htm');
        }
    }

    public function update()
    {
        $prod = new Prod($this->db);

        if($this->f3->exists('POST.update'))
        {
            $prod->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/prod');
        } 
        else
        {
            $prod->getById($this->f3->get('PARAMS.id'));
            
            $this->f3->set('page_head','Update');
            $this->f3->set('view','prod/update.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $prod = new Prod($this->db);
            $prod->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/prod');
    }

} // main class

?>
