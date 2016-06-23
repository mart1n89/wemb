<?php

class Login extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render('login/index');
    }
    
    function run() {
        //Array ( [login] => asd [password] => asd [loginBtn] => Anmelden ) 
        if (null != (filter_input(INPUT_POST, 'loginBtn'))) {
            $this->model->run();
        }
        if (null != (filter_input(INPUT_POST, 'registerBtn'))) {
            $this->view->render('login/register');
        }
        if (null != (filter_input(INPUT_POST, 'nopassBtn'))) {
            echo "Do lost pass";
        }        
    }
    
    function register() {
        //@ToDo: Email schicken.
        print_r(filter_input_array(INPUT_POST));
    }
}
