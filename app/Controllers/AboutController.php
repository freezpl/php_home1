<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;

    class AboutController extends Controller {

        public function index($id = null) : View {
            return new View('about');
        }
    }

   