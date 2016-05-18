<?php

class Database extends PDO
{
    public function __construct() {
        //DB access parameters
        parent::__construct('mysql:host=http://projekt.wi.fh-flensburg.de;dbname=projekt2015b', 'projekt2015b', 'P2016b4');
    }
}