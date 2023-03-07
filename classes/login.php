<?php
require_once './classes/db.php';
class Login{
    public static function isLoggedIn(){
        if(isset($_SESSION['token'])){
            if($user = DB::query("SELECT user_id FROM login_tokens WHERE token = :token", array(":token" => $_SESSION['token']))){
                return $user[0]['user_id'];
            }
        }

        return false;
    }
}
?>