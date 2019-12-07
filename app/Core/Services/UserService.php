<?php

namespace App\Core\Services;

use PDO;

class UserService
{

    static function fetchUsers($currPage, $onPage, $search)
    {
        $all = self::count($search);

        if ($all > $onPage) {
            $mod = $all % $onPage;
            $pages = floor($all / $onPage);
            if ($mod > 0)
                $pages++;
        }
        else
            $pages = 1;

        if ($currPage > $pages)
            $currPage = $pages;
        $from = ($currPage - 1) * $onPage;
        if(strlen($search) == 0)
            $query = "SELECT * FROM tbl_users LIMIT " . $from . ", " . $onPage;
        else
            $query = "SELECT * FROM tbl_users WHERE name LIKE '%". $search ."%' LIMIT " . $from . ", " . $onPage;

        $dbh = DbService::setCotnnection();
        $sth = $dbh->prepare($query);
        $sth->execute();
        $result = array();
        while ($res = $sth->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $res);
        }

        $dbh = null;

        $data['users'] = $result;
        $data['currPage'] = $currPage;
        $data['onPage'] = $onPage;
        $data['pages'] = $pages;
        $data['search'] = $search;


        return $data;
    }

    private static function count($search)
    {
        $query = "SELECT COUNT(*) AS 'all' FROM tbl_users";
        if (strlen($search) != 0)
            $query .= " WHERE name LIKE '%" . $search . "%'";

        $dbh = DbService::setCotnnection();
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
            $res = $sth->fetch(PDO::FETCH_ASSOC);
            return $res['all'];
        } catch (Exception $e) {
            var_dump($e);
            return null;
        } finally {
            $dbh = null;
        }
    }

    static function register($user)
    {
        $dbh = DbService::setCotnnection();
        $query = "INSERT INTO tbl_users (name, email, password, age) VALUES (?, ?, ?, ?)";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute([$user->name, $user->email, $user->password, $user->age]);
            $dbh = null;
            return true;
        } catch (Exception $e) {
            throw $e;
            return false;
        }
    }

    static function login($user)
    {
        $dbh = DbService::setCotnnection();
        $query = "SELECT * FROM tbl_users WHERE email='" . $user->email . "'";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
            $res = $sth->fetch(PDO::FETCH_ORI_FIRST);
            $dbh = null;
            if ($res == false)
                return null;
        } catch (Exception $e) {
            throw $e;
            return null;
        }

        if ($res['password'] != $user->password)
            return null;

        $user->token = self::generateToken();
        $user->name = $res['name'];
        $user->age = $res['age'];

        return $user;
    }

    private static function generateToken()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}
