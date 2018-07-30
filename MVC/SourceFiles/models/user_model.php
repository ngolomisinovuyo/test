<?php
class User_Model extends Model {

    function __construct() {
        parent:: __construct();
    }
    public function userList(){
        $data=$this->db->select('SELECT user_id,login,role FROM users');
        
        return $data;
    }
    
    public function listUser($user_id) 
    {
        $data=$this->db->selectRow('SELECT user_id,login,password,role FROM users WHERE user_id=:user_id '
                ,array('user_id'=>$user_id));
     
        return $data;
    }
    public function Create($data)
    {
        $this->db->insert('users',$data);
    }
   
    public function EditSave($data)
    {
        $post_data = array(
            'login'=>filter_input(0,'login_name',513),
            'password'=>Hash::create('md5',filter_input(0,'user_password',513),HASH_KEY),
            'role'=>filter_input(0,'role',513)
            
        );
        $this->db->update('users',$post_data,'user_id ='.$data['user_id']);
    }
    public function Delete($user_id)
    {
        $data=$this->db->selectRow('SELECT role FROM users WHERE user_id=:user_id',
                array('user_id'=>$user_id));
        
        if($data['role']=='owner')
        {
            return FALSE;
        }
        $this->db->delete('users','user_id='.$user_id);
        
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

