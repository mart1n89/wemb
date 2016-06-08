<?php 

class Vote_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getSessionByCode() {
        $st = $this->db->prepare('SELECT * FROM session WHERE codeNo = :codeNo');
        $st->execute(array(':codeNo' => $_POST['codeNo']));
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $data = $st->fetch();
        
        $count = $st->rowCount();
        if ($count > 0) {            
            return $data;
        } else {
            header('location: ../home');
        }
    }
    
    public function getTopicById($id) {
        $st = $this->db->prepare('SELECT * FROM topic where topicID = '.$id);
        $st->execute();
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $data = $st->fetch();
        
        $count = $st->rowCount();
        if ($count > 0) {
            return $data;
        } else {
            header('location: ../home');
        }
    }
    
    public function getQuestionSetById($id) {
        $st = $this->db->prepare('SELECT * FROM questionSet as qs
                                    join question as q on q.questionID = qs.questionID
                                  WHERE topicID = '.$id);
        $st->execute();
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $data = $st->fetchAll();
        
        $count = $st->rowCount();
        if ($count > 0) {
            return $data;
        } else {
            header('location: ../home');
        }
    }
    
    public function getQuestiosnSetById($id) {
        $st = $this->db->prepare('SELECT * FROM questionSet as qs
                                    join question as q on q.questionID = qs.questionID
                                  WHERE topicID = '.$id);
        $st->execute();
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $data = $st->fetchAll();
        
        $count = $st->rowCount();
        if ($count > 0) {
            return $data;
        } else {
            header('location: ../home');
        }
    }
}