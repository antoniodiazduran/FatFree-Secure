<?php

class QuoteController extends Controller {

    public function index()
    {
        $quote = new Quote($this->db);
        $this->f3->set('quote',$quote->all(''));
        $this->f3->set('page_head','List');
        $this->f3->set('view','quote/list.htm');
    }
    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $quote = new Quote($this->db);
            $quote->add();
            $this->f3->reroute('/quote');
        }
        else
        {
            $this->f3->set('page_head','Create');
            $this->f3->set('view','/quote/create.htm');
        }
    }

    public function update()
    {
        $quote = new Quote($this->db);

        if($this->f3->exists('POST.update'))
        {
            $quote->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/quote');
        } 
        else
        {
            $quote->getById($this->f3->get('PARAMS.id'));
            
            $this->f3->set('page_head','Update');
            $this->f3->set('view','quote/update.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $quote = new Quote($this->db);
            $quote->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/quote');
    }

} // main class

?>
