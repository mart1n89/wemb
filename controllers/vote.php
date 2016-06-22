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
    
    public function requireAnswers($ids) {
        $this->view->answers = $this->model->getAnswerById($ids);
    }
    
    public function checkSessionAnswered($idToCheck) {
        Session::init();   
        if (Session::get('sessionIDs') != null) {
            $allSessions = Session::get('sessionIDs');
            $allSessionsArray = explode(',', $allSessions);
            foreach ($allSessionsArray as $value) {
                if (!($value == $idToCheck)) {
                    $canAccessSession = true;
                }
                else {
                    $canAccessSession = false;
                    break;
                }
            }
            return $canAccessSession;
        }
        else {
            return true;
        }
    }
    
    private function refreshCookie($idToCheck) {
        Session::init();            
        if (Session::get('sessionIDs') != null) {
            $allSessions = Session::get('sessionIDs');
            $allSessionsArray = explode(',', $allSessions);
            foreach ($allSessionsArray as $value) {
                if (!($value == $idToCheck)) {
                    $append = true;
                }
                else {
                    $append = false;
                    break;
                }
            }   
            if ($append) {
                Session::set('sessionIDs', Session::get('sessionIDs') . ","  . $idToCheck);     
            }                   
        }
        else {
            $append = true;
            Session::set('sessionIDs', $idToCheck);
        }        
        Session::setCookie();
        return $append;
    }
    
    public function send($sessionID) { 
        
        if ($this->refreshCookie($sessionID)) {
            
            foreach ($_POST as $key => $value) {
                if ($key == "sessionID") {
                    $data['sessionID'] = $value;
                } else {
                    $data[$key] = $value;
                }
            }
        
            $this->model->writeBackResultsByAnswerID($data);   
            $this->view->render('vote/send');
        }
        else {
            $this->view->msg = 'Sie haben das Quiz bereits beantwortet...';
            $this->view->render('errorhandler/index');
        }            
    }    
}