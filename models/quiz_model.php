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
        $st = $this->db->prepare('DELETE questionSet, topic, question, answer FROM topic t INNER JOIN questionSet qs ON t.topicID = qs.topicID INNER JOIN question q ON q.questionID = qs.questionID INNER JOIN answer a ON a.questionID = q.questionID WHERE t.topicID = :id ');
        $succ = $st->execute(array(':id' => $id));
        if($succ != TRUE){
            $st = $this->db->prepare('DELETE FROM topic WHERE topicID = :id');
            $succ = $st->execute(array(':id' => $id));
        }
        //echo (json_encode(0));
    }
    
    public function getSingleQuiz($id){
        $st = $this->db->prepare('SELECT * FROM topic WHERE topicID = :id');
        $st->execute(array(':id' => $id));
        return $st->fetch();
    }
    
    public function xhrAddQuiz(){
        $data = $_POST['data'];
        $topic = $_POST['topic'];
        $user = Session::get('user');
        
        $this->db->beginTransaction();
        
        $l_data = explode("]", $data);
        $st_topic = $this->db->prepare('INSERT INTO topic (userID, topicName) VALUES( :userID, :topic);');
        $st_topic->execute(array(':userID' => $user, 
                                  ':topic' => $topic));
        
//        $st_questions = $this->db->prepare('INSERT INTO question (questionText) VALUES ( :question)');
//        for ($i = 0; $i < sizeof($l_data); $i++){
//            if($l_data[$i] != ""){
//            $question = explode("[", $l_data[$i]);
//            $st_questions->execute(array(':question' => $question[0]));
//            $answers = explode(";", $question[1]);
////            $quiz[$question] = $answers;
////            var_dump($question[0]);
//            //var_dump($answers);
//            //var_dump($quiz);
//            }
//        }
        $this->db->commit();
        
    }

    public function edit(){
        
    }
}