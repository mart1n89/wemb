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
            Session::init();
            Session::set('code', $_POST['codeNo']);
            return $data;
        } else {
            header('location: ../home');
        }
    }
    
    public function getTopic($id){
        $st = $this->db->prepare('SELECT * FROM topic WHERE topicID = ' . $id);
    }
    
}