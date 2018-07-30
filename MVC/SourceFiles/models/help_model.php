<?php
class Help_Model extends Model {

    function __construct() {
        parent::__construct();
        echo 'called by help model';
    }
    
    public function bluh() {
        return 10+10;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

