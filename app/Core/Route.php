<?php

namespace App\Core;

    class Route {
        private $path;
        private $controller;
        private $action;

        function __construct($routerPath, $routerController, $routerAction = 'index'){
            $this->path = $routerPath;
            $this->controller = $routerController;
            $this->action = $routerAction;
        }

    public function __get($property)
    {
        switch ($property)
        {
            case 'path':
                return $this->path;
            case 'controller':
                return $this->controller;
            case 'action':
                return $this->action;
        }
    }
    }