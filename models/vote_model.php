<?php 

class Vote_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getSessionByCode() {
        $st = $this->db->prepare('SELECT * FROM session WHERE codeNo = :codeNo');
        $st->execute(array(':codeNo' => $_POST['codeNo']));
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $data = $st->fetchAll();
        
        $count = $st->rowCount();
        if ($count > 0) {            
            return $data;
        } else {
            header('location: ../home');
        }
    }

    public function getTopicById($paramInt = 0) {
        $st = $this->db->prepare('SELECT * FROM topic WHERE topicID = ' . $paramInt);
        $st->execute();
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $data = $st->fetchAll();
        return $data;
    }
}