<?php

class Help extends Controller {

    function __construct() {
        parent::__construct();
        echo 'we are inside help<br/>';
    }
    
    public function other($arg = false) {
        echo 'we are inside other<br/>';
        echo 'optional'.$arg.'<br/>';
        
        require 'models/help_model.php';
        $model = new Help_Model();
    }
}
