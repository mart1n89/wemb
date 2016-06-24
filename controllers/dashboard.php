<?php

class Dashboard extends Controller {
    public function __construct() {
        parent::__construct();
        $logged = Session::get('loggedIn');
        if ($logged !== true) {
            Session::destroy();
            header('location: ../login');
            exit;
        }
                
        $this->view->js = array('dashboard/js/default.js');
    }
    
    public function index(){
        $this->view->render('dashboard/index');
    }
    
    public function logout(){
        Session::destroy();
        header('location: ' .URL. 'home');
        exit;
    } 
    
    function xhrInsert(){
        $this->model->xhrInsert();
    }
    
    function xhrGetListings(){
        $this->model->xhrGetListings();
    }
    
    function xhrDeleteListing(){
        $this->model->xhrDeleteListing();
    }
}