<?php

class Quiz_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function topicList(){
        
        $st = $this->db->prepare('SELECT topicName FROM topic');
        $st->execute();
        return $st->fetchAll();
    }
}