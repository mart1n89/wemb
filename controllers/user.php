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
        $data['userName'] = filter_input(INPUT_POST, 'userName');
        $data['lastName'] = filter_input(INPUT_POST, 'lastName');
        $data['firstName'] = filter_input(INPUT_POST, 'firstName');
        $data['email'] = filter_input(INPUT_POST, 'email');
        $data['password'] = md5(filter_input(INPUT_POST, 'password'));
        $data['defaultTimer'] = filter_input(INPUT_POST, 'defaultTimer');
        $data['role'] = filter_input(INPUT_POST, 'role');
        
        if (!$this->model->userExists($data['userName'])) {        
            $this->model->create($data);
            $this->view->msg = $data['userName'] . ' wurde hinzugef&uuml;gt.';        
            $this->view->userList = $this->model->userList();
            $this->view->render('user/index');
        } else {
            $this->view->msg = $data['userName'] . ' konnte nicht hinzugef&uuml;gt werden. Benutzer existiert bereits.';        
            $this->view->userList = $this->model->userList();
            $this->view->render('user/index');
        }  
    }
    
    public function newuser(){
        $this->view->render('user/insert');
    }
    
    public function edit($id){
        $this->view->user = $this->model->getUserById($id);
        $this->view->render('user/edit');
    }
    
    public function editSave(){
        if ($this->model->userExists(filter_input(INPUT_POST, 'userName')) && filter_input(INPUT_POST, 'userName') == Session::get('oldUser')) {
            $this->model->saveEdit(filter_input_array(INPUT_POST));
            $this->view->msg = filter_input(INPUT_POST, 'userName') . ' wurde bearbeitet.';        
            $this->view->userList = $this->model->userList();
            $this->view->render('user/index');
        } elseif (!$this->model->userExists(filter_input(INPUT_POST, 'userName')) && filter_input(INPUT_POST, 'userName') != Session::get('oldUser')) {
            $this->model->saveEdit(filter_input_array(INPUT_POST));
            $this->view->msg = filter_input(INPUT_POST, 'userName') . ' wurde bearbeitet.';       
            $this->view->userList = $this->model->userList();
            $this->view->render('user/index');
        } else {
            $this->view->msg = Session::get('oldUser') . ' konnte nicht bearbeitet werden. Benutzer existiert bereits.';        
            $this->view->userList = $this->model->userList();
            $this->view->render('user/index');
        }
    }

    public function delete($id){
        $this->model->delete($id);
        header('location: '. URL . 'user');
    }
}