<?php
class Dashboard extends Controller {

    public function __construct() 
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('dashboard/js/main.js');
    }
    public function index()
    {
        $this->view->msg ='Dashboard';
        $this->view->title ='Dashboard';
        $this->view->render('dashboard/index');
    }
    
    public function logout()
    {
        Session::destroy();
        header('location:../login');
        exit();
    }
    
    public function xhrInsert()
    {
        $this->model->xhrInsert();
    }
    public function xhrGetListings()
    {
        $this->model->xhrGetListings();
    }
    public function xhrDeleteListings()
    {
        $this->model->xhrDeleteListings();
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

