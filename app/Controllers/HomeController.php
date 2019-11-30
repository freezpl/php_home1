<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Core\Services\UserService;

    class HomeController extends Controller {

        public function index($id = null) : View {

            return new View('home');
        }
    }

   