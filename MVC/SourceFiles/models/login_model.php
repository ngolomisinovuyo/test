<?php
class Login_Model extends Model{

    function __construct() {
        parent::__construct();
    }
    public function run()
    {
        $login = filter_input(INPUT_POST,'login_name',FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST,'login_password',FILTER_SANITIZE_STRING);
        $smt=$this->db->prepare("SELECT user_id,role FROM users WHERE "
                . "login =:login AND password = :password");
        $smt->setFetchMode(PDO::FETCH_ASSOC);
        //$smt->setFetchMode(2);
        $smt->execute(array(
            ':login'=>$login,
            ':password'=>Hash::create('md5',$password,HASH_KEY)
        ));
        $data = $smt->fetch();
        $count = $smt->rowCount();
        if($count > 0)
        {
            //login
            Session::init();
            Session::set('role', $data['role']);
            Session::set('logged_in', true);
            Session::set('user_id', $data['user_id']);
            header('location:../dashboard');
        }
        else 
        {
            // show an error
            header('location:../login');
        }
        
    }
}

