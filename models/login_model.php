<?php

class Login_Model extends Model {
    
    public function __construct() {
        parent::__construct();
        //echo md5('martin');
    }
    
    public function run(){
        $sth = $this->db->prepare("SELECT id FROM users WHERE login = :login AND password = :password");
        $sth->excecute(array(':login' => $_POST['login'],
                                  ':password' => $_POST['password']
        ));
        
        $data = $sth->fetchAll();
        print_r($data);
    }
}