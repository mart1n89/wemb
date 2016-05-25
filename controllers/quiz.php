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
    
    public function create(){
        $this->view->render('quiz/create');
    }
    
    public function save(){
        $this->model->save();
    }
    
    public function edit($id){
        $this->view->getSingleTopic = $this->model->getSingleQuiz($id);
        $this->view->render('quiz/edit');
    }

    public function delete($id){
        $this->model->delete($id);
        header('location: '. URL . 'quiz');
    }
}
