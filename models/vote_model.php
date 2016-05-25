<?php 

class Vote_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function voteList(){
        $st = $this->db->prepare('SELECT * FROM SESSION AS s
                                    JOIN topic AS t ON t.topicID = s.topicID
                                    JOIN quiz AS q ON q.quizID = t.quizID
                                    JOIN question AS qs ON qs.questionID = q.questionID');
        $st->execute();
        print_r($st->fetchAll());
        return $st->fetchAll();
    }
}