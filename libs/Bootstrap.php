<?php

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        if(empty($url[0])) {
            require 'controllers/home.php';
            $controller = new Home();
            $controller->index();
            return false;
        }
        
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/errorhandler.php';
            $controller = new ErrorHandler();
            return false;
        }
        
        $controller = new $url[0];
        $controller->loadModel($url[0]);
        
        
        // calling methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
            $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
                }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
                }
            }
        }

        function error() {
            require 'controllers/errorhandler.php';
            $controller = new ErrorHandler();
            $controller->index();
            return false;
        }

}
