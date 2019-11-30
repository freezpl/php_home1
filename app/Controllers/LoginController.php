<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Models\User;
use \App\Core\Services\UserService;

    class LoginController extends Controller {

        public function index($id = null) : View {
            return new View('login');
        }

        public function log() : View {
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            $user = UserService::login($user);
            $data['user'] = $user;
            return ($user == null) ? new View('login', $data) : new View('profile', $data);
        }
    }
