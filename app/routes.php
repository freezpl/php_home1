<?php

use App\Core\Route;
use App\Core\Router;
use App\Controllers;


Router::get(new Route('', 'Home'));
Router::get(new Route('animals', 'Animals'));

Router::get(new Route('login', 'Login'));
Router::post(new Route('login/log', 'Login', 'log'));

Router::get(new Route('register', 'Register'));
Router::post(new Route('register/add', 'Register', 'add'));

Router::get(new Route('users', 'Users'));

Router::get(new Route('homes/1/part1', 'Homes'));
Router::post(new Route('homes/1/part1/calendar', 'Homes', 'calendar'));

Router::get(new Route('homes/1/colors', 'Homes', 'getColors'));
Router::post(new Route('homes/1/colors/calculate', 'Homes', 'calculateColor'));


