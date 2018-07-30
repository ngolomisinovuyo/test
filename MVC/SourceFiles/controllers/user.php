<?php
class User extends Controller {

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index()
    {
        $this->view->title ='User';
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }
    
    public function Create()
    {
     
        $data = array(
            'login'=>filter_input(0,'login_name',513),
            'password'=>Hash::create('md5',filter_input(0,'user_password',513),HASH_KEY),
            'role'=>filter_input(0,'role',513)
        );
        
        //TODO: input verification
        $this->model->Create($data);
        header('location:'.URL.'user');
    }
    public function Edit($user_id)
    {
        // fecth individual user
        $this->view->user = $this->model->listUser($user_id);
        $this->view->render('user/edit');
        //$this->model->Edit($id);
    }
    public function editSave($user_id)
    {
        
        $data = array(
            'login'=>filter_input(0,'login_name',513),
            'password'=>Hash::create('md5',filter_input(0,'user_password',513),HASH_KEY),
            'role'=>filter_input(0,'role',513),
            'user_id'=>$user_id
        );
        
        //TODO: input verification
        $this->model->EditSave($data);
        header('location:'.URL.'user');
       
    }
    public function Delete($user_id)
    {
        $this->model->Delete($user_id);
        header('location:'.URL.'user');
    }
}


