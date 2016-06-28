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
            $this->view->render('login/lostpw');
        }        
    }
    
    public static function validateEmail($email) {
        if (strpos($email, '@hs-flensburg.de') !== false) {
            return true;
        }
        if (strpos($email, '@fh-flensburg.de') !== false) {
            return true;
        }
        if (strpos($email, '@stud.fh-flensburg.de') !== false) {
            return true;
        }
        if (strpos($email, '@wi.fh-flensburg.de') !== false) {
            return true;
        } else { return false; }
    }
    
    function lostpw() {
        
        if (!Login::validateEmail(filter_input(INPUT_POST, 'email')))
        {
            $this->view->msg = 'Es sind nur Hochschul-E-Mail-Adressen erlaubt.';
            $this->view->render('login/lostpw');
            exit;
        } 
        
        else
        {
            $string = "Folgender Benutzer hat ein neues Passwort beantragt ... \r\n\r\n";
            $string .= "Benutzer: " . filter_input(INPUT_POST, 'userName') . "\r\n";
            $string .= "E-Mail: " . filter_input(INPUT_POST, 'email') . "\r\n";
            $stringHtml = str_replace("\r\n", "<br>", $string);
            
            require 'libs/phpmailer/class.phpmailer.php';
            require 'libs/phpmailer/class.smtp.php';

            $mail = new PHPMailer();

            $mail->isSMTP();

            $mail->Host = "193.174.250.201";
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('helpdesk@wi.fh-flensburg.de', 'Headcrash & Co');
            $mail->addAddress('martin.kleinod@stud.fh-flensburg.de', 'Martin Kleinod');
            $mail->addAddress('moritz.heeg@stud.fh-flensburg.de', 'Moritz Heeg');
            $mail->addAddress('jan.conrad@stud.fh-flensburg.de ', 'Jan Conrad');
            $mail->addAddress('christoph-patrick.petersen@stud.fh-flensburg.de ', 'Christoph Patrick Petersen');
            $mail->addAddress('felix.ruhser@stud.fh-flensburg.de', 'Felix Ruhser');
            $mail->addAddress('daniel.stelzer@stud.fh-flensburg.de', 'Daniel Stelzer');
            $mail->addAddress('thomas.mueller@wi.fh-flensburg.de', 'Prof. Dipl.-Kfm. Thomas Müller');

            $mail->Subject = 'Testimeter Passwort vergessen eingegangen (projekt2015b)';
            $mail->Body    = $stringHtml;
            $mail->AltBody = $string;
        
            if(!$mail->send()) {
                $this->view->msg = 'Mailer Error: '  . $mail->ErrorInfo;
                $this->view->render('login/lostpw');
            } else {
                $this->view->msg = 'Email wurde erfolgreich versendet.';
                $this->view->render('login/lostpw');
            }
        }
    }
    
    function register() {
        
        if (!Login::validateEmail(filter_input(INPUT_POST, 'email')))
        {
            $this->view->msg = 'Es sind nur Hochschul-E-Mail-Adressen erlaubt.';
            $this->view->render('login/register');
            exit;
        }
                
        $string = "Folgender Benutzer hat eine Registrierung beantragt ... \r\n\r\n";
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
        
        $mail->Host = "193.174.250.201";
        $mail->Port = 25;
        $mail->CharSet = 'UTF-8';
        
        $mail->setFrom('helpdesk@wi.fh-flensburg.de', 'Headcrash & Co');
        $mail->addAddress('martin.kleinod@stud.fh-flensburg.de', 'Martin Kleinod');
        $mail->addAddress('moritz.heeg@stud.fh-flensburg.de', 'Moritz Heeg');
        $mail->addAddress('jan.conrad@stud.fh-flensburg.de ', 'Jan Conrad');
        $mail->addAddress('christoph-patrick.petersen@stud.fh-flensburg.de ', 'Christoph Patrick Petersen');
        $mail->addAddress('felix.ruhser@stud.fh-flensburg.de', 'Felix Ruhser');
        $mail->addAddress('daniel.stelzer@stud.fh-flensburg.de', 'Daniel Stelzer');
        $mail->addAddress('thomas.mueller@wi.fh-flensburg.de', 'Prof. Dipl.-Kfm. Thomas Müller');
        
        $mail->Subject = 'Testimeter Registrierung eingegangen (projekt2015b)';
        $mail->Body    = $stringHtml;
        $mail->AltBody = $string;
        
        if(!$mail->send()) {
            $this->view->msg = 'Mailer Error: '  . $mail->ErrorInfo;
            $this->view->render('login/register');
        } else {
            $this->view->msg = 'Email wurde erfolgreich versendet.';
            $this->view->render('login/register');
        }       
    }
}
