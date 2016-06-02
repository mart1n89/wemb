<?php 

class Vote_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function voteList(){
        $st = $this->db->prepare('select * from session as s
                                    join topic as t on t.topicID = s.topicID
                                    join questionSet as qs on qs.topicID = t.topicID
                                    join question as q on q.questionID = qs.questionID
                                    join answer as a on a.questionID = q.questionID
                                  where codeNo = :codeNo');
        
        $st->execute(array(':codeNo' => $_POST['codeNo']));            
        $data = $st->fetchAll();
        
        $count = $st->rowCount();
        if ($count > 0){
            Session::init();
            Session::set('code', $_POST['codeNo']);
            return $data;
        } else {
            header('location: ../index');
        }
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
            header('location: ../index');
        }
    }    
}