<?php 

class Vote_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function voteList(){
        $st = $this->db->prepare('SELECT * FROM session AS s
                                    JOIN topic AS t ON t.topicID = s.topicID
                                    JOIN quiz AS q ON q.quizID = t.quizID
                                    JOIN question AS qs ON qs.questionID = q.questionID
                                    JOIN answer AS a ON a.questionID = q.questionID
                                  WHERE codeNo = :codeNo');
        
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
}