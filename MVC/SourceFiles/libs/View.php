<?php
date_default_timezone_set('Africa/Johannesburg');
class View {

    function __construct() {
        //echo 'This is the base View <br/>';
    }
    public function render($name, $noinclude = false)
    {
        if($noinclude == TRUE)
        {
            require 'views/'.$name.'.php';
        }
        else
        {
            require 'views/header.php';
            require 'views/'.$name.'.php';
            require 'views/footer.php';
        }
        
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

