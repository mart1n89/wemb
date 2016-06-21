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
        
        $this->view->js = array('quiz/js/default.js');
    }
    
    public function index(){
        $this->view->topicList = $this->model->topicList();
        $this->view->controller = $this;
        $this->view->render('quiz/index');
    }
    
    public function create(){
        $this->view->render('quiz/create');
    }
    
    public function edit($id){
        $this->view->quiz = $this->model->getSingleQuiz($id);
        $this->view->render('quiz/edit');
    }
   
    public function delete($id){
        $this->model->delete($id);
        header('location: '. URL . 'quiz');
    }
    
    public function xhrAddQuiz(){
        $this->model->xhrAddQuiz();
    }
    
    public function xhrEditQuiz(){
        $this->model->xhrEditQuiz();
    }
    
    public function start($id){
        $this->model->start($id);
        $this->view->render('quiz/start');
    }
}
