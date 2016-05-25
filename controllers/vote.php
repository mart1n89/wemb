<?php

class Vote extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->voteList = $this->model->voteList();
        $this->view->render('vote/index');        
    }
}