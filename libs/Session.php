<?php

class Session {
    
    public static function init(){
        @session_start();
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    
    public static function get($key){
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }
    
    public static function destroy(){
        //unset($_SESSION);
        session_destroy();
    }
    
    public static function setCookie() {
        Session::set('ip_addr', Session::get_client_ip());
        foreach ($_SESSION as $key => $value) {
            setcookie($key, $value);
        }
    }
    
    public static function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}