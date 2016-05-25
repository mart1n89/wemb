<?php

class Quiz extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false){
            Session::destroy();
            header('location: ../login');
            exit;
        }
    }
    
    public function index(){
        $this->view->topicList = $this->model->topicList();
        $this->view->render('quiz/index');
    }
}
