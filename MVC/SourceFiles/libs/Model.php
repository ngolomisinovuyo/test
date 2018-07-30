<?php
class Model {

    function __construct() {
        //echo 'This is a base model <br/>';
        $this->db = new Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASSWORD);
    }

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

