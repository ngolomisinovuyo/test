<?php

class Home extends Controller {

    function __construct() {
        parent::__construct();
        //echo 'We are in Home page';
        
    }
    
    function index()
    {   
        $this->view->msg ='Home';
        $this->view->title ='Home';
        $this->view->render('home/index');
    }
    function details()
    {
        $this->view->render('home/index');
    }

}
