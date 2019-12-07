<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Core\Services\UserService;

    class UsersController extends Controller {

        public function index($id = null) : View {
            $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
            $onPage = (isset($_REQUEST['onPage'])) ? $_REQUEST['onPage'] : 3;
            if(isset($_GET['res_count'])) 
                $onPage = $_GET['res_count'];
            $search = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : '';
            if(isset($_GET['name'])) 
                $search = $_GET['name'];
            
            $data = UserService::fetchUsers($page, $onPage, $search);
            return new View('users', $data);
        }

        public function fetch() : View {
            $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
            $onPage = 3;
            $search =  '';
            $users = UserService::fetchUsers($page, $onPage, $search);
            return new View('users', $users);
        }
    }

   