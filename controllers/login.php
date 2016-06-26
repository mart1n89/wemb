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
                
        $string = "Folgender Benutzer hat eine Registrierung beantragt : \r\n";
        $string .= "Benutzer: " . filter_input(INPUT_POST, 'userName') . "\r\n";
        $string .= "Nachname: " . filter_input(INPUT_POST, 'lastName') . "\r\n";
        $string .= "Vorname: " . filter_input(INPUT_POST, 'firstName') . "\r\n";
        $string .= "E-Mail: " . filter_input(INPUT_POST, 'email') . "\r\n";
        $string .= "Passwort: " . filter_input(INPUT_POST, 'password') . "\r\n";
        $string .= "Timer: " . filter_input(INPUT_POST, 'defaultTimer') . "\r\n";
        $string .= "Rolle: " . filter_input(INPUT_POST, 'role');
        $stringHtml = str_replace("\r\n", "<br>", $string);
        
        require 'libs/phpmailer/class.phpmailer.php';
        require 'libs/phpmailer/class.smtp.php';
        
        $mail = new PHPMailer();
        
        $mail->isSMTP();
        $mail->Host = "mail.stud.fh-flensburg.de";
        $mail->Username = "makl9851";
        $mail->Password = "*";
        $mail->Port = 25;
        $mail->CharSet = 'UTF-8';
        
        $mail->setFrom('martin.kleinod@stud.fh-flensburg.de', 'Martin Kleinod');
        $mail->addAddress('martin.kleinod@stud.fh-flensburg.de', 'Martin Kleinod');
        $mail->addAddress('moritz.heeg@stud.fh-flensburg.de', 'Moritz Heeg');
        $mail->addAddress('jan.conrad@stud.fh-flensburg.de ', 'Jan Conrad');
        $mail->addAddress('christoph-patrick.petersen@stud.fh-flensburg.de ', 'Christoph Patrick Petersen');
        $mail->addAddress('felix.ruhser@stud.fh-flensburg.de', 'Felix Ruhser');
        $mail->addAddress('daniel.stelzer@stud.fh-flensburg.de ', 'Daniel Stelzer');
        
        $mail->Subject = 'Testimeter';
        $mail->Body    = $stringHtml;
        $mail->AltBody = $string;
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }       
    }
}
