<?php

error_reporting(0);

class DB extends PDO
{
    public function __construct() {
        try {
            parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            Session::set('dbError', null);
        } catch (Exception $ex) {
            Session::set('dbError', $ex->getMessage());
        }        
    }
}