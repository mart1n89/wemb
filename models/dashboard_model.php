<?php

class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function xhrInsert(){
        $text = filter_input(INPUT_POST, 'text');
        
        $st = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
        $st->execute(array(':text' => $text));
        
        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
        }
    
    function xhrGetListings(){
        $st = $this->db->prepare('SELECT * FROM data');
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $st->execute();
        $data = $st->fetchAll();
        echo json_encode($data);
    }
    
    function xhrDeleteListing(){
        $id = filter_input(INPUT_POST, 'id');
        $st = $this->db->prepare('DELETE FROM data WHERE id = "'.$id.'"');
        $st->execute();
        echo json_encode('isOk');
    }
    
}
