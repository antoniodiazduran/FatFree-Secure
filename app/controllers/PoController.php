<?php

class PoController extends Controller {

    public function index()
    {
        $po = new Po($this->db);
        $bpid = $this->f3->get('SESSION.bp_id');
        $this->f3->set('po',$po->all($bpid));
	$this->f3->set('bpid',$bpid);
        $this->f3->set('page_head','List');
        $this->f3->set('view','po/list.htm');
    }

    public function query()
    {
        $po = new Po($this->db);
        $bpid = $this->f3->get('SESSION.bp_id');
	$bpidf = $this->f3->get('POST.bpidf');
        $pst = $this->f3->get('POST.postatus');
	$ofs = $this->f3->get('POST.offset');

	$this->f3->set('bpid',$bpid);
	$this->f3->set('bpidf',$bpidf);
	$this->f3->set('postatus',$pst);
	$this->f3->set('offset',$ofs);

	if ($bpid == 'BP000000X') { $bpid = $bpidf; }

        $this->f3->set('po',$po->query($bpid,$pst,$ofs));
        $this->f3->set('page_head','List');
        $this->f3->set('view','po/list.htm');
    }

    public function querydetail()
    {
        $po = new Po($this->db);
        $pon = $this->f3->get('PARAMS.po');

        //if ($bpid == 'BP000000X') { $bpid = $bpidf; }

        $this->f3->set('po',$po->detail($pon));
        $this->f3->set('page_head','Detail PO');
	$this->f3->set('site','PO# '.$pon);
        $this->f3->set('view','po/dlist.htm');
    }
}

?>
