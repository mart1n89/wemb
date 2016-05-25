<?php

class User extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        
        if ($logged == false || $role != 'owner') {
            Session::destroy();
            header('location: ../login');
            exit;
        }
    }
    
    public function index(){
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }
    
    public function create(){
        $data = array();
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = $_POST['role'];
        
        $this->model->create($data);
        header('location: '. URL . 'user');
    }
    
    public function edit($id){
        // fetch user
        $this->view->user = $this->model->userSingleList($id);
        $this->view->render('user/edit');
    }
    
    public function editSave(){
        header('location: '. URL . 'user');
    }


    public function delete($id){
        $this->model->delete($id);
        header('location: '. URL . 'user');
    }
}