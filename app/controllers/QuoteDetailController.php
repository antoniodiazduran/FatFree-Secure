<?php

class QuoteDetailController extends Controller {

    public function index()
    {
        $quote = new QuoteDetail($this->db);
        $this->f3->set('quote',$quote->all(''));
        $this->f3->set('page_head','List');
        $this->f3->set('view','quotedetail/list.htm');
    }
    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $quote = new QuoteDetail($this->db);
            $quote->add();
            $this->f3->reroute('/quotedetail');
        }
        else
        {
            $this->f3->set('page_head','Create');
            $this->f3->set('view','/quotedetail/create.htm');
        }
    }

    public function update()
    {
        $quote = new QuoteDetail($this->db);

        if($this->f3->exists('POST.update'))
        {
            $quote->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/quotedetail');
        } 
        else
        {
            $quote->getById($this->f3->get('PARAMS.id'));
            
            $this->f3->set('page_head','Update');
            $this->f3->set('view','quotedetail/update.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $quote = new QuoteDetail($this->db);
            $quote->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/quotedetail');
    }

} // main class

?>
