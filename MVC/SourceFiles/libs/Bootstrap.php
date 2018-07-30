<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bootstrap {

    private $_url = null;
    private $_controller = null;
    private $_controller_path ='controllers/';
    private $_model_path ='models/';
    private $_error_file ='error.php';
    private $_default_file ='home.php';
    /**
     * 
     * @return boolean | string
     */
    function __construct()
    {
       
    }
    /**
     * Starts the Bootstrap
     * @return boolean | string
     */
    public function init()
    {
         //set the protected url
        $this->_getUrl();
       // load the default controller
      
        if(empty($this->_url[0]))
        {
            $this->_loadDefaultController();
            return FALSE;
        }
        $this->_loadExistingController();
        $this->_callControllerMethod(); 
    }
    /**
     * (Optional) Set custom path to controllers
     * @param string $path
     */
    public function setControllerPath($path)
    {
        $this->_controller_path = trim($path,'/').'/';
    }
      /**
     * (Optional) Set custom path to models
     * @param string $path
     */
    public function setModelPath($path)
    {
        $this->_model_path = trim($path,'/').'/';
    }
      /**
     * (Optional) Set custom path to error page
     * @param string $path
     */
    public function setErrorFile($path)
    {
        $this->_error_file = trim($path,'/');
    }
    
    /**
     * (Optional) Set custom path to default page
     * @param string $path
     */
    public function setDefaultFile($path)
    {
        $this->_default_file = trim($path,'/');
    }
    /**
     * Fetches the $_GET from the url
     */
    private function _getUrl()
    {
        $url = filter_input(INPUT_GET, 'url');
        $url = rtrim($url, '/');
        $url = filter_var($url,FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }
    /**
     * loads if there is no $_GET parameter passed
     */
    private function _loadDefaultController()
    {
        require $this->_controller_path. $this->_default_file;
        $this->_controller = new Home();
        $this->_controller->index();
    }
    /**
     * loads if there is a $_GET parameter passed
     * @return boolean
     */
    private function _loadExistingController()
    {
        $file = $this->_controller_path . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require_once $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0],$this->_model_path);
        } else {
           $this->_error();
           return FALSE;
            //throw new Exception("The file $file does not exist"); 
        }
    }
    /**
     * if a method is passed in the $_GET Url parameter
     * example http://localhost:8080/MVC/SourceFiles/user/editUser/1
     * url[0] = the controller
     * url[1] = the method
     * url[2] = parameter
     * url[3] = parameter
     * url[4] = parameter
     *calling the methods
     */
    private function _callControllerMethod()
    {
        
        
        $length = count($this->_url);
        if($length > 1)
        {
            if(!method_exists($this->_controller, $this->_url[1]))
            {
                $this->_error();
            }
        }
        switch ($length) {
            case 5:
                 //controller->method(param1,param2,param3)
                 $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                break;
            case 4:
                //controller->method(param1,param2)
                 $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);

                break;
            case 3:
                  //controller->method(param1)
                 $this->_controller->{$this->_url[1]}($this->_url[2]);

                break;
            case 2:

                //controller->method(param1,param2,param3)
                 $this->_controller->{$this->_url[1]}();
                break;
            
            default:
                $this->_controller->index();
                break;
        }

    }

    private function _error(){
        require $this->_controller_path.$this->_error_file;
        $this->_controller = new ErrorPage();
        $this->_controller->index();
        exit();
    }

}
