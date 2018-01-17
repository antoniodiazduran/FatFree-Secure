<?php

class UpController extends Controller {

    public function index()
    {
        $ups = new Upload($this->db);
        $this->f3->set('ups',$ups->all('ATS'));
        $this->f3->set('page_head','List');
        $this->f3->set('view','upload/list.htm');
    }

    public function create()
    {
        if($this->f3->exists('POST.upload'))
        {
            $ups = new Upload($this->db);
            $ups->upload($this->f3->get('POST'));
            $this->f3->reroute('/upload');
        }
        else
        {
            $this->f3->set('page_head','New');
            $this->f3->set('view','upload/create.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $ups = new Upload($this->db);
            $ups->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/upload');
    }

} // main class

?>
