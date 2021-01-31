<?php

class DocController extends Controller {

    public function index()
    {
        $classvar = new Documents($this->d1);
        $ses =  $this->f3->get('SESSION.roles');
        $company =  $this->f3->get('SESSION.company');
        $this->f3->set('sqldata',$classvar->all($ses,$company,$this->f3->get('PARAMS.id')) );
        $this->f3->set('section','documents');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[1,2,3]');
        $this->f3->set('page_head','List');
        $this->f3->set('view','documents/list.htm');
    }
    public function docslist()
    {
        $classvar = new Documents($this->d1);
        $this->f3->set('sqldata',$classvar->allid($this->f3->get('PARAMS.id'),$this->f3->get('PARAMS.cid')) );
        $this->f3->set('section','documents');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[1,2,3]');
        $this->f3->set('page_head','List');
        $this->f3->set('view','documents/list.htm');
    }


    public function create()
    {
        if($this->f3->exists('POST.upload'))
        {
            $classvar = new Documents($this->d1);
            $result = $classvar->upload($this->f3->get('POST'));
		if($result!='[]') {
			$this->f3->set('msg',$result);
			$this->f3->set('view','/auth/internalerror.htm');
		} else {
          		$this->f3->reroute('/documents');
		}
        }
        else
        {
            $this->f3->set('section','documents');
            $this->f3->set('page_head','New');
	    $this->f3->set('mode','create');
            $this->f3->set('view','documents/create.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new Documents($this->d1);
            $classvar->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/documents');
    }

} // main class

?>
