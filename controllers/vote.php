<?php

class Vote extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->session = $this->model->getSessionByCode();
        $this->view->render('vote/index');        
    }
}