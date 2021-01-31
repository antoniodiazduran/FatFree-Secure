<?php

class HousesController extends Controller {

    private $viewFolder = "houses";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new Houses($this->db);
        $this->f3->set('sqldata',$classvar->all($this->f3->get('SESSION.company')));
        $this->f3->set('section','houses');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[2,3,8]');
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/list.htm');
    }

    public function docscreate()
    {
        if($this->f3->exists('POST.upload'))
        {
            $classvar = new Documents($this->d1);
	    $cid = $this->f3->get('POST.clientid');
	    $id = $this->f3->get('POST.housesid');
            $result = $classvar->upload($this->f3->get('POST'));
		if($result!='[]') {
			$this->f3->set('msg',$result);
			$this->f3->set('view','/auth/internalerror.htm');
		} else {
          		$this->f3->reroute('/houses/documents/'.$id.'/'.$cid);
		}
        }
        else
        {
            $this->f3->set('section','documents');
            $this->f3->set('page_head','New');
	    $this->f3->set('mode','create');
            $this->f3->set('view','/houses/documents'+$this->f3->get('PARAMS.id')+"/"+$this->f3->get('PARAMS.cid'));
        }
    }
    public function documents()
    {
        $classvar = new Houses($this->db);
        $this->f3->set('sqldata',$classvar->alldocs($this->f3->get('SESSION.company'),$this->f3->get('PARAMS.id')));
        $this->f3->set('section','documents');
        $this->f3->set('subnav','true');
        $this->f3->set('back','yes');
        $this->f3->set('backto','clients/houses/'.$this->f3->get('PARAMS.cid'));
	$this->f3->set('create','false');
        $this->f3->set('columns','[2,3,8]');
        $this->f3->set('page_head','List');
	$this->f3->set('housesid',$this->f3->get('PARAMS.id'));
	$this->f3->set('clientid',$this->f3->get('PARAMS.cid'));
	$this->f3->set('housesaddress',$classvar->houseAddress($this->f3->get('PARAMS.id')));
	$this->f3->set('clientname',$classvar->clientName($this->f3->get('PARAMS.cid')));
        $this->f3->set('view',$this->getViewFolder().'/documents.htm');
    }

    public function apihouselist()
    {
        $classvar = new Houses($this->db);
        $id = $this->f3->get('PARAMS.id');
        $this->f3->set('houselist',$classvar->apihouselist($id) );
            exit;       // API Call to get data for popup
    }

    public function create()
    {
        if($this->f3->exists('POST.create'))
        {
            $classvar = new Houses($this->db);
            $classvar->add();
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $this->f3->set('section','houses');
            $this->f3->set('page_head','New');
	    $this->f3->set('mode','create');
            $this->f3->set('view','/'.$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function update()
    {
        $classvar = new Houses($this->db);

        if($this->f3->exists('POST.update'))
        {
            $classvar->edit($this->f3->get('POST.id'));
            $this->f3->reroute('/'.$this->getViewFolder());
        }
        else
        {
            $classvar->getById($this->f3->get('PARAMS.id'));
            $this->f3->set('page_head','Update');
            $this->f3->set('section','houses');
	    $this->f3->set('mode','update');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $clients = new Clients($this->db);
            $clients->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/'.$this->getViewFolder());
    }

} // main class

?>
