<?php

class Auth {

    function __construct() {
        
    }
    public static function handleLogin()
    {
        @session_start();
        $logged = $_SESSION['logged_in'];
        
        //print_r($_SESSION);
        if($logged==FALSE)
        {
            session_destroy();
            header('location:../login');
            exit();
        }
    }

}