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
        $st = $this->db->prepare('DELETE * FROM topic t INNER JOIN questionSet qs ON t.topicID = qs.topicID INNER JOIN question q ON q.questionID = qs.questionID INNER JOIN answer a ON a.questionID = q.questionID WHERE t.topicID = '.$id);
        //$st->excecute(array(':id' => $id));
        $st->excecute();
        echo (json_encode(0));
    }
    
    public function getSingleQuiz($id){
        $st = $this->db->prepare('SELECT * FROM topic WHERE topicID = :id');
        $st->execute(array(':id' => $id));
        return $st->fetch();
    }
    
    public function xhrAddQuiz(){
        //$topic = $_POST['questions'];
        
//        foreach ($questions as $key => $wert){
//            $answers = $questions[$wert];
//            for ($i = 0; $i < count($answers); $i++){
//                echo($answers[$i]);
//            }
//        }
    }

    public function edit(){
        
    }
}