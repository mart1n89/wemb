<?php

class User_Model extends Model {
    
    public function __construct() {
        parent::__construct();
        //echo md5('test');
    }
    
    public function userList(){
        //$st = $this->db->prepare('SELECT userID, userName, role FROM user');
        $st = $this->db->prepare('SELECT * from user');
        $st->execute();
        return $st->fetchAll();
    }
    
    public function userExists($username){
        $st = $this->db->prepare('SELECT userName FROM user WHERE userName = :username');
        $st->execute(array(':username' => $username));
        $st->fetch();
        
        $count = $st->rowCount();
        if ($count > 0) {            
            return true;
        } else {
            return false;
        }
    }
    
    public function userSingleList($id){
        $st = $this->db->prepare('SELECT userID, userName, role FROM user WHERE userID = :id');
        $st->execute(array(':id' => $id));
        return $st->fetchAll();
    }
    
    public function getUserById($id){
        $st = $this->db->prepare('SELECT * FROM user WHERE userID = :id');
        $st->execute(array(':id' => $id));
        return $st->fetch();
    }

    public function create($data){
        $st = $this->db->prepare('INSERT into user (userName, lastName, firstName, email, password, defaultTimer, role) VALUES (:username, :lastname, :firstname, :email, :password, :defaulttimer, :role)');
        $st->execute(array(
            ':username' => $data['userName'],
            'lastname' => $data['lastName'],
            'firstname' => $data['firstName'],
            'email' => $data['email'],
            ':password' => $data['password'],
            ':defaulttimer' => $data['defaultTimer'],
            ':role' => $data['role']
            ));
    }
    
    public function delete($id){
        //$st_quiz = $this->db->('DELETE quiz ')
        
        $st = $this->db->prepare('DELETE FROM user WHERE userID = :id AND role != :role');
        $st->execute(array(
            ':id' => $id,
            ':role' => 'owner'
            ));
    }
    
    public function saveEdit($user){
        
        if (!isset($user['role'])) {
            $role = Session::get('oldRole');
        } else {
            $role = $user['role'];
        }
        
        if (null != ($user['password'])) {
            $pass = md5($user['password']);
        } else {
            $pass = $user['oldpass'];
        }
        
        $st = $this->db->prepare('UPDATE user SET userName = :username, lastName = :lastname, '
                . 'firstName = :firstname, email = :email, password = :password, defaultTimer = :defaulttimer, role = :role WHERE userID = :userid');
        $st->execute(array(
            ':username' => $user['userName'],
            'lastname' => $user['lastName'],
            'firstname' => $user['firstName'],
            'email' => $user['email'],
            ':password' => $pass,
            ':defaulttimer' => $user['defaultTimer'],
            ':role' => $role,
            ':userid' => $user['userID']
        ));
    }
}
