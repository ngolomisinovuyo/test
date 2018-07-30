<?php
class Note_Model extends Model {

    function __construct() {
        parent:: __construct();
    }
    public function noteList(){
        $data=$this->db->select('SELECT * FROM notes WHERE user_id=:user_id',array(
            'user_id'=>$_SESSION['user_id']
        ));
        
        return $data;
    }
    
    public function listNote($note_id) 
    {
        $data=$this->db->selectRow('SELECT * FROM notes WHERE user_id = :user_id AND note_id=:note_id ',
                array('user_id'=>$_SESSION['user_id'],'note_id'=>$note_id));
        //print_r($data);
        //die();
        return $data;
    }
    public function Create($data)
    {
      
        $this->db->insert('notes',$data);
       
    }
   
    public function EditSave($data)
    {
        $post_data = array(
            'title'=>filter_input(0,'title',513),
            'content'=>filter_input(0,'content',513),
            'date_added'=>date('Y-m-d H:i:s')
            );
            
        $this->db->update('notes',$post_data,'note_id ='.$data['note_id'].' AND user_id='.$data['user_id']);
    }
    public function Delete($note_id)
    {
//        $data=$this->db->selectRow('SELECT notes FROM  WHERE note_id=:note_id',array('note_id'=>$note_id));
//        
//        if($data['role']=='owner')
//        {
//            return FALSE;
//        }
        $this->db->delete('notes','note_id='.$note_id.' AND user_id='.$_SESSION['user_id']);
        
    }
}


