<?php

class MainController extends Controller {
    public function form_index(){
        $this->f3->set('page_head','form');
        $this->f3->set('view','main.htm');
    }
    public function main_index(){
        $this->f3->set('page_head','Capture your data...');
        $this->f3->set('view','main.htm');
    }

} // main class

?>
