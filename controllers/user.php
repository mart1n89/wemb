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
        
        $this->view->js = array('user/js/default.js');
    }
    
    public function index(){
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }
    
    public function create(){
        $data = array();
        $data['userName'] = filter_input(INPUT_POST, 'username');
        $data['password'] = md5(filter_input(INPUT_POST, 'password'));
        $data['role'] = filter_input(INPUT_POST, 'role');

        $this->model->create($data);
        header('location: '. URL . 'user');
    }
    
    public function edit($id){
        $this->view->user = $this->model->getUserById($id);
        $this->view->render('user/edit');
    }
    
    public function editSave(){
        $this->model->saveEdit(filter_input_array(INPUT_POST));
        header('location: '. URL . 'user');
    }


    public function delete($id){
        $this->model->delete($id);
        header('location: '. URL . 'user');
    }
}