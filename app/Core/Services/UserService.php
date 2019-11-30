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

        echo $query;

        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
        }catch (Exception $e){
            throw $e;
            exit();
        }

        $dbh = null;


    }

}