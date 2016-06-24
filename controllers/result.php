<?php

class Result extends Controller {
    public function __construct() {
        parent::__construct();
        
        //$this->view->js = array('result/js/default.js');
    }
    
    public function index(){
        $this->view->allResults = $this->model->allResults();
        $this->view->controller = $this;
        $this->view->render('result/index');
    }
    
    public function show($id){
        $this->view->results = $this->model->show($id);
        $this->view->render('result/show');
    }
    
}
