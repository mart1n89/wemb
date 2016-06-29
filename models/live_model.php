<?php

class Live_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function close($id){
        $st_session = $this->db->prepare('SELECT SINGLE sessionID FROM session WHERE codeNo = :currentCodeNo AND isActive = 1;');
        $st_session->execute(array('currentCodeNo' => $id));
        $session = $st_session->fetch();
        
        $st_update_code = $this->db->prepare('UPDATE code SET isActive = 0 WHERE codeNo = :currentCodeNo;');
        $st_update_code->execute(array('currentCodeNo' => $id));
        
        $st_update_session = $this->db->prepare('UPDATE session SET isActive = 0 WHERE codeNo = :currentCodeNo AND isActive = 1;');
        $st_update_session->execute(array('currentCodeNo' => $id));
        
        return $session;
    }
    
    public function getCode($id){
        $st_session = $this->db->prepare('SELECT sessionID FROM session WHERE codeNo = :currentCodeNo AND isActive = 1 LIMIT 1;');
        $st_session->execute(array('currentCodeNo' => $id));
        $arr = $st_session->fetch();
        return $arr[0];
    }


    public function xhrShow(){
        $id = $_POST['currentCode'];
        $st = $this->db->prepare('SELECT q.questionID, q.questionText, a.answerID, a.answerText, r.clicks, t.topicName FROM session s INNER JOIN result r ON r.sessionID = s.sessionID INNER JOIN question q ON r.questionID = q.questionID INNER JOIN answer a ON a.answerID = r.answerID INNER JOIN topic t ON t.topicID = s.topicID WHERE s.codeNo = :codeNo AND isActive = 1;');
        $st->execute(array(':codeNo' => $id));
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $st->fetchAll();
        return $arr;
    }


    public function currentLive(){
        $user = Session::get('user');
        $st = $this->db->prepare('SELECT * FROM topic t INNER JOIN session s ON s.topicID = t.topicID WHERE t.userID = :user AND s.isActive = 1;');
        $st->execute(array(':user' => $user));
        return $st->fetchAll();
    }
}

