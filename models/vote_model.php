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
    
    public function getAnswerByID($ids) {   
        
        $searchString = "(";
        foreach ($ids as $key => $value) {
            if ($key != 0) {
                $searchString .= "," . $value;
            } else {
                $searchString .= $value;
            }
        }
        $searchString .= ")";
        
        $st = $this->db->prepare('SELECT * FROM answer WHERE questionID IN ' . $searchString);
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
    
    public function writeBackResultsByAnswerID($data) {
        $st = $this->db->prepare('INSERT into result (sessionID, questionID, answerID, clicks)');
    }
    
    public function create($data){
        $st = $this->db->prepare('INSERT into user (`userName`, `password`, `role`) VALUES (:userame, :password, :role)');
        $st->execute(array(
            ':username' => $data['userName'],
            ':password' => $data['password'],
            ':role' => $data['role']
            ));
    }
}