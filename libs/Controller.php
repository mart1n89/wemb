<?php

class Controller {

    function __construct() {
        echo 'main contoller <br/>';
        $this->view = new View();
    }

}