<?php

use App\Core\Route;
use App\Core\Router;
use App\Controllers;


Router::get(new Route('', 'Home'));
Router::get(new Route('animals', 'Animals'));
Router::get(new Route('about', 'About'));
Router::get(new Route('news', 'News'));
Router::get(new Route('register', 'Register'));
Router::post(new Route('register/add', 'Register', 'add'));

Router::get(new Route('users', 'Users'));