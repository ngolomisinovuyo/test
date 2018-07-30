<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Help extends Controller{

    function __construct() {
        parent::__construct();
        //echo 'We are inside Help';
        
    }
    function index()
    {
        $this->view->msg ='Help';
        $this->view->title ='Hellp';
        $this->view->render('help/index');
    }
    public function Other($name = false){
        echo 'We are inside Other, uyeva '.$name.'? <br/>';
        
        $model = new Help_Model();
        $this->view->msg = $model->bluh();
    }

}

