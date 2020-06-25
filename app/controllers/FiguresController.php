<?php

class FiguresController extends Controller {

    private $viewFolder = "figures";

    public function setViewFolder($vf) { 
        $this->viewFolder = $vf; 
    }
    public function getViewFolder() { 
        return $this->viewFolder; 
    }

    public function index()
    {
        $classvar = new Figures($this->db);
        $usr =  $this->f3->get('SESSION.user');
        $this->f3->set('figures',$classvar->all($this->f3->get('PARAMS.id'),$usr) );
        $this->f3->set('relation',$this->f3->get('PARAMS.id'));
        $this->f3->set('instructions',$classvar->relation($this->f3->get('PARAMS.id')));
        $this->f3->set('page_head','List');
        $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
    }

    public function create()
    {
        if($this->f3->exists('POST.upload'))
        {
            $classvar = new Figures($this->db);
            $relation = $this->f3->get('POST.relation');
            $usr = $this->f3->get('SESSION.user');
            $result = $classvar->upload($this->f3->get('POST'),$this->f3->get('SESSION.user'));
            
            if($result!='[]') {
                $this->f3->set('msg',$result);
                $this->f3->set('view','/auth/internalerror.htm');
            } else {
                $this->f3->set('figures',$classvar->all($relation,$usr) );
                $this->f3->set('relation',$relation);
                $this->f3->set('instructions',$classvar->relation($relation));
                $this->f3->set('page_head','List');
                $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
            }
        }
        else
        {
            $this->f3->set('msg','Something is terribly wrong!');
            $this->f3->set('view','/auth/internalerror.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $classvar = new Figures($this->db);
            $relation = $classvar->figrelation($this->f3->get('PARAMS.id'));
            $usr = $this->f3->get('SESSION.user');
            $inst = $classvar->relation($relation);
            $this->f3->set('relation',$relation);
            $this->f3->set('instructions',$inst);
            $classvar->delete($this->f3->get('PARAMS.id'));
            $this->f3->set('figures',$classvar->all($relation,$usr) );
            $this->f3->set('page_head','List');
            $this->f3->set('view',$this->getViewFolder().'/hybrid.htm');
        }
        else {
            $this->f3->set('msg','Something is terribly wrong!');
            $this->f3->set('view','/auth/internalerror.htm');
        }
    }

} // main class

?>