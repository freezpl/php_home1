<?php

use App\Core\Route;
use App\Core\Router;
use App\Controllers;


Router::get(new Route('', 'Home'));
Router::get(new Route('about', 'About'));
Router::get(new Route('news', 'News'));