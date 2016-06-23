<?php

class Live extends Controller {
    public function __construct() {
        parent::__construct();
        
        $this->view->js = array('live/js/default.js');
    }
    
    public function index(){
        $this->view->controller = $this;
        $this->view->render('live/index');
    }
    
    public function show($id){
        $this->view->currentCode = $id;
        $this->view->render('live/show');
    }
    
    public function close($id){
        $this->model->close($id);
        $this->view->currentCode = $id;
        $this->view->render('live/close');   
    }
    
    public function xhrShow(){
        $this->model->xhrShow();
    }
}

