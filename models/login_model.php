<?php

class Login_Model extends Model {
    
    public function __construct() {
        parent::__construct();
        //echo md5('test');
    }
    
    public function run(){
        $st = $this->db->prepare("SELECT userID, role FROM user WHERE username = :login AND password = MD5(:password)");
        $st->execute(array(':login' => filter_input(INPUT_POST, 'login'),
                           ':password' => filter_input(INPUT_POST, 'password')
        ));
        
        $data = $st->fetch();
        
        
        $count = $st->rowCount();
        if ($count > 0){
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('user', $data['userID']);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
    }
}