<?php 
namespace App\Core\Services;
use PDO;

class UserService{

    static function fetchUsers(){

        $dbh = DbService::setCotnnection();
        $sth = $dbh->prepare("SELECT * from tbl_users");
        $sth->execute();
        $result = array();
        while($res = $sth->fetch(PDO::FETCH_ASSOC)){
            array_push($result, $res); 
        }

        $dbh = null;
        return $result;
    }

    static function register($user){
        $dbh = DbService::setCotnnection();
        $query = "INSERT INTO tbl_users (name, email, password, age) VALUES ('".$user->name."','".$user->email."','".$user->password."','".$user->age."')";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
            $dbh = null;
            return true;
        }catch (Exception $e){
            throw $e;
            return false;
        }

    }

    static function login($user){
        $dbh = DbService::setCotnnection();
        $query = "SELECT * FROM tbl_users WHERE email='".$user->email."'";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
            $res = $sth->fetch(PDO::FETCH_ORI_FIRST);
            $dbh = null;
            if($res == false)
            return null;
        }catch (Exception $e){
            throw $e;
            return null;
        }
        
        if($res['password']!=$user->password)
        return null;
        
        $user->token = self::generateToken();
        $user->name = $res['name'];
        $user->age = $res['age'];
       
        return $user;
    }

    private static function generateToken(){
        if (function_exists('com_create_guid') === true)
        return trim(com_create_guid(), '{}');
        
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

    }

}