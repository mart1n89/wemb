<?php

class ErrorHandler extends Controller {

    function __construct() {
        parent::__construct();
        echo 'this is an error';
        
        $this->view->render('error/index');
    }

}