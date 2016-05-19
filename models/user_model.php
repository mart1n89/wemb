<?php

class User_Model extends Model {
    
    public function __construct() {
        parent::__construct();
        //echo md5('test');
    }
    
    public function userList(){
        $st = $this->db->prepare('SELECT userid, username, role FROM users');
        $st->execute();
        return $st->fetchAll();
    }
    
    public function create($data){
        $st = $this->db->prepare('INSERT into users (`username`, `password`, `role`) VALUES (:username, :password, :role)');
        $st->execute(array(
            ':username' => $data['username'],
            ':password' => $data['password'],
            ':role' => $data['role']
            ));
    }
}