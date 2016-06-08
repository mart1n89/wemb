<?php

class Vote extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->session = $this->model->getSessionByCode();
        $this->view->controller = $this;
        $this->view->render('vote/index');        
    }
    
    public function requireTopic($id){
        $this->view->topic = $this->model->getTopicById($id);
    }
    
    public function requireQuestionSet($id) {
        $this->view->questions = $this->model->getQuestionSetById($id);
    }
}