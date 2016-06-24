<?php

class Model {
    
    function __construct() {
        Session::init();
        $this->db = new DB();
    }
}
