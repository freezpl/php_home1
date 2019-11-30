<?php 
namespace App\Core\Services;
use PDO;

class DbService{

    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "animals";

    static function setCotnnection(){
        $conn = new PDO('mysql:host=localhost;dbname='.self::$dbname, self::$username, self::$password);
        
        try {
            $conn = new PDO('mysql:host='.self::$servername.';dbname=animals', self::$username, self::$password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $conn;
    }


 
}