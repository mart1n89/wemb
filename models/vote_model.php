<?php 

class Vote_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getSessionByCode() {
        $st = $this->db->prepare('SELECT * FROM session WHERE codeNo = :codeNo AND isActive = 1');
        $st->execute(array(':codeNo' => filter_input(INPUT_POST, 'codeNo')));
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

        foreach ($data as $key => $value) {
            if ($key == 'sessionID') {
                $sessionID = $value;
            }
            else {
                $questions[$key] = $value;
            }
        }
        
        if (isset($questions) && isset($sessionID)) {
            
            $sqlString = 'SELECT clicks FROM result WHERE sessionID = :sessionID and questionID = :questionID and answerID = :answerID into @var;

                          UPDATE result
                          SET clicks = @var + 1
                          WHERE sessionID = :sessionID and questionID = :questionID and answerID = :answerID;';
            
            foreach ($questions as $key => $value) {                
                    $st = $this->db->prepare($sqlString);
                    $st->execute(array(
                        ':sessionID' => $sessionID,
                        ':questionID' => $key,
                        ':answerID' => $value
            ));
                    
            }
        }
    }
}