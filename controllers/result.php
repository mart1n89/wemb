<?php

class Result extends Controller {
    public function __construct() {
        parent::__construct();
        
        //$this->view->js = array('result/js/default.js');
    }
    
    public function index(){
        $this->view->controller = $this;
        $this->view->render('result/index');
    }
    
}
