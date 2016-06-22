<?php

class User_Model extends Model {
    
    public function __construct() {
        parent::__construct();
        //echo md5('test');
    }
    
    public function userList(){
        $st = $this->db->prepare('SELECT userID, userName, role FROM user');
        $st->execute();
        return $st->fetchAll();
    }
    
    public function userSingleList($id){
        $st = $this->db->prepare('SELECT userID, userName, role FROM user WHERE userID = :id');
        $st->execute(array(':id' => $id));
        return $st->fetchAll();
    }

    public function create($data){
        $st = $this->db->prepare('INSERT into user (`userName`, `password`, `role`) VALUES (:username, :password, :role)');
        $st->execute(array(
            ':username' => $data['userName'],
            ':password' => $data['password'],
            ':role' => $data['role']
            ));
    }
    
    public function delete($id){
        //TODO: the user shouldn't be able to delete the owner
        $st = $this->db->prepare('DELETE FROM users WHERE userID = :id');
        $st->execute(array(
            ':id' => $id
            ));
    }
    
    public function saveEdit(){
        
    }
}