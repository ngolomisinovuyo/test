<?php
require 'form/val.php';
class Form {
    /** the $current_fiel, The immediately posted item **/
    private $current_field = null;
    /** the $post_data, Stored the posted data **/
    private $post_data = array();
    /** the $val, The validate object **/
    private $val = array();
    
    /** the $error Holds the form errors **/
    private $error = array();
    /**
     * __construct instantiates the Val class
     */
    function __construct() {
        $this->val = new Val();
    }
   
    public function post($field) 
    {
        $this->postData[$field] = filter_input(0,$field);
        $this->current_field = $field;
        return $this;
    }
    
    public function fetch($field_name = false)
    {
        if($field_name)
        {
            if(isset($this->post_data[$field_name]))
            {
               return $this->post_data[$field_name];
            }
            else
            {
               return false; 
            }
        }
        else 
        {
            return $this->postData;
        }
        
    }
    /**
     * 
     * @param string $type_of_validator a method from the Form/Val class
     * @param string $arg a property to validate against
     * @return $this
     */
    public function val($type_of_validator,$arg = null) 
    {
       if($arg === null)
       {
            $error= $this->val->{$type_of_validator}($this->post_data[$this->current_field]);
       }
       else 
       {
            $error= $this->val->{$type_of_validator}($this->post_data[$this->current_field],$arg);
       }
      
       if($error)
        {
           $this->error[$this->current_field] = $error;
        }
        return $this;
    }
    /**
     * handles the from and throws an exception on error
     * @return boolean
     * @throws Exception
     */
    public function submit() {
        if(empty($this->error)){
            return TRUE;
        }
        else 
        {
            $str = '';
            
            foreach ($this->error as $key => $value) {
                $str .= $key .'=>'.$value .'<br/>';
            }
            throw new Exception($str);
        }
    }
}
