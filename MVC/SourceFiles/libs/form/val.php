<?php

class Val {

    function __construct() {
        
    }
    
    public function minlength($data,$arg)      
    {
        if(strlen($data) < $arg)
        {
            return 'Your string can only be '.$arg. ' long';
        }
    }
    
     public function maxlength($data,$arg)      
    {
        if(strlen($data) > $arg)
        {
            return 'Your strins cannot be longer than'.$arg;
        }
    }
    
     public function integer($data)      
    {
        if(ctype_digit($data)==false)
        {
            return 'Your string must be a digit';
        }
        
    }
    
    public function __call($name, $arguments) {
        throw new Exception("$name does not exist inside of ".__CLASS__);
    }

}
