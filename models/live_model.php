<?php

class Live_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function close($id){
        $st_update_code = $this->db->prepare('UPDATE code SET isActive = 0 WHERE codeNo = :currentCodeNo;');
        $st_update_code->execute(array('currentCodeNo' => $id));
        
        $st_update_session = $this->db->prepare('UPDATE session SET isActive = 0 WHERE codeNo = :currentCodeNo AND isActive = 1;');
        $st_update_session->execute(array('currentCodeNo' => $id));
    }
}

