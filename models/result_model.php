<?php

class Result_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function allResults(){
        $user = Session::get('user');
        //$st = $this->db->prepare('SELECT t.topicID, t.topicName, s.end, r.questionID, r.answerID, r.clicks, q.questionText, a.answerText FROM topic t INNER JOIN session s ON s.topicID = t.topicID INNER JOIN result r ON r.sessionID = s.sessionID INNER JOIN question q ON q.questionID = r.questionID INNER JOIN answer a ON a.answerID = r.answerID WHERE t.userID = :user AND isActive = 0');
        $st = $this->db->prepare('SELECT s.sessionID, s.end, t.topicName FROM session s INNER JOIN topic t ON s.topicID = t.topicID WHERE t.userID = :user AND s.isActive = 0');
        $st->execute(array(':user' => $user));
        $st->setFetchMode(PDO::FETCH_ASSOC);
        return $st->fetchAll();   
    }   
    
    public function show($id){
        $st = $this->db->prepare('SELECT r.questionID, r.answerID, a.answerText, q.questionText, r.clicks FROM result r INNER JOIN question q ON q.questionID = r.questionID INNER JOIN answer a ON a.answerID = r.answerID WHERE r.sessionID = :session');
        $st->execute(array(':session' => $id));
        return $st->fetchAll();
    }
}
