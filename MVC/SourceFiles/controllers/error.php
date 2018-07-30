<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ErrorPage extends Controller {

    function __construct() {
        parent::__construct();
        //echo 'This is an error';
        
    }
    
    function index()
    {
        $this->view->msg ='This page does not exist';
        $this->view->title = '404 Error';
        $this->view->render('error/index');
    }

}
