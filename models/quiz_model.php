<?php

class Quiz_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function topicList(){
        $user = Session::get('user');
        $st = $this->db->prepare('SELECT topicID, topicName FROM topic WHERE userID = '.$user);
        $st->execute();
        return $st->fetchAll();
    }
    
    public function save(){
        
    }
    
    public function delete($id){
       //TODO: it should also remove every reference
        $st = $this->db->prepare('DELETE FROM topic WHERE topicID = :id');
        $st->execute(array(
            ':id' => $id
            ));
    }
    
    public function getSingleQuiz($id){
        $st = $this->db->prepare('SELECT * FROM topic WHERE topicID = :id');
        $st->execute(array(':id' => $id));
        return $st->fetch();
    }


    public function edit(){
        
    }
}