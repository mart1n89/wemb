<?php

class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function xhrInsert(){
        $text = filter_input(INPUT_POST, 'text');
        
        $st = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
        $st->execute(array(':text' => $text));
        
        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
        }
    
    function xhrGetListings(){
        $st = $this->db->prepare('SELECT * FROM data');
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $st->execute();
        $data = $st->fetchAll();
        echo json_encode($data);
    }
    
    function xhrDeleteListing(){
        $id = filter_input(INPUT_POST, 'id');
        $st = $this->db->prepare('DELETE FROM data WHERE id = "'.$id.'"');
        $st->execute();
        echo json_encode('isOk');
    }
    
    public function currentLive(){
        $user = Session::get('user');
        $st = $this->db->prepare('SELECT * FROM topic t INNER JOIN session s ON s.topicID = t.topicID WHERE t.userID = :user AND s.isActive = 1;');
        $st->execute(array(':user' => $user));
        return $st->fetchAll();
    }
    
    public function allResults(){
        $user = Session::get('user');
        //$st = $this->db->prepare('SELECT t.topicID, t.topicName, s.end, r.questionID, r.answerID, r.clicks, q.questionText, a.answerText FROM topic t INNER JOIN session s ON s.topicID = t.topicID INNER JOIN result r ON r.sessionID = s.sessionID INNER JOIN question q ON q.questionID = r.questionID INNER JOIN answer a ON a.answerID = r.answerID WHERE t.userID = :user AND isActive = 0');
        $st = $this->db->prepare('SELECT s.sessionID, s.end, t.topicName FROM session s INNER JOIN topic t ON s.topicID = t.topicID WHERE t.userID = :user AND s.isActive = 0 ORDER BY s.sessionID DESC LIMIT 10');
        $st->execute(array(':user' => $user));
        $st->setFetchMode(PDO::FETCH_ASSOC);
        return $st->fetchAll();   
    }  
    
}
