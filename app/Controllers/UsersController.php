<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Core\Services\UserService;

    class UsersController extends Controller {

        public function index($id = null) : View {  
            $users['users'] = UserService::fetchUsers();
            return new View('users', $users);
        }
    }

   