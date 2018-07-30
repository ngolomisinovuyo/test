<?php
class Hash {

    
    function __construct() {
        
    }
    /**
     * 
     * @param string $algorithm The algorithm to use(md5,hash1,wirlpool etc)
     * @param string $data the data to encode
     * @param string $salt (This should be the same throughout the system)
     * @return string the hashed data
     */
    public static function create($algorithm,$data,$salt)
    {
       $context= hash_init($algorithm, HASH_HMAC, $salt);
       hash_update($context,$data);
       return hash_final($context);
    }

}

