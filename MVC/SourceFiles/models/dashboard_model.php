<?php
class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
        //echo 'called by dashboard model';
        
    }
    
    function xhrInsert() {
        $text= filter_input(0,'text',513);
        $this->db->insert('data',array('text'=>$text));
        
        $data = array('text'=>$text,'data_id'=>$this->db->lastInsertId());
        echo json_encode($data);
    }
    function xhrGetListings()
    {
        $data = $this->db->select('SELECT * FROM data');
        echo json_encode($data);
    }
    function xhrDeleteListings()
    {
        $data_id = filter_input(INPUT_POST,'data_id',FILTER_VALIDATE_INT);
        //$id = filter_input(0,'id',257);
        $this->db->delete('data','data_id='.$data_id);
        
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

