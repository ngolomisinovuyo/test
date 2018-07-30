<?php

class Note extends Controller {

    function __construct() {
         parent::__construct();
       Auth::handleLogin();
    }
    public function index()
    {
        $this->view->title ='Note List';
        $this->view->noteList = $this->model->noteList();
        $this->view->render('note/index');
    }
    
    public function Create()
    {
    
        $data = array(
            'user_id'=>$_SESSION['user_id'],
            'title'=>filter_input(0,'title',513),
            'content'=>filter_input(0,'content',513),
            'date_added'=>date('Y-m-d H:i:s') // user FMT aka UCT 0:00
        );
       
        //TODO: input verification
        $this->model->Create($data);
        header('location:'.URL.'note');
    }
    public function Edit($note_id)
    {
        // fecth individual user
        $this->view->note = $this->model->listNote($note_id);
        if(empty($this->view->note))
        {
            die('This is an invalid note');
        }
        $this->view->title ='Note Edit';
        $this->view->render('note/edit');
        //$this->model->Edit($id);
    }
    public function editSave($note_id)
    {
        
        $data = array(
            'user_id'=>$_SESSION['user_id'],
            'note_id'=>$note_id
        );
        
        //TODO: input verification
        $this->model->EditSave($data);
        header('location:'.URL.'note');
       
    }
    public function Delete($note_id)
    {
        
        $this->model->Delete($note_id);
        header('location:'.URL.'note');
    }
    

}
