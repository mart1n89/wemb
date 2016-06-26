<?php

class DB extends PDO
{
    public function __construct() {
        try {
            $old_error_lebel = error_reporting();
            error_reporting(0);
            parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            Session::set('dbError', null);
            error_reporting($old_error_lebel);
        } catch (Exception $ex) {
            Session::set('dbError', $ex->getMessage());
        }        
    }
}