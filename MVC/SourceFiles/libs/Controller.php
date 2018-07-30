<?php
class Controller {

    function __construct() {
        //echo 'This is a main Controller <br/>';
        $this->view = new View();
    }
    /**
     * 
     * @param string $name name of the model
     * @param string $path path to the model
     */
    public function loadModel($name,$model_path='models/')
    {
        $path = $model_path.$name.'_model.php';
        if(file_exists($path))
        {   require $model_path.$name.'_model.php';
            //require $path;
            $model_name = $name.'_model' ;
            $this->model = new $model_name();
        }
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

