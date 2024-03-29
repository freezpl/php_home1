<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Models\User;
use \App\Core\Services\UserService;

    class RegisterController extends Controller {

        public function index($id = null) : View {
            return new View('register');
        }

        public function add() : View {
            $user = new User();
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->age = $_POST['age'];

            $isReg = UserService::register($user);

            return $isReg ? new View('home') : new View('register');
        }
    }
