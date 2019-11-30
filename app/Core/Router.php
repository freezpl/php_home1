<?php

use App\Core;

namespace App\Core;

    class Router {
        
        private static $getRoutes = array();
        private static $postRoutes = array();
        
        static function get(Route $route){
            if($route != null)
            array_push(self::$getRoutes, $route);
        }

        static function post(Route $route){
            if($route != null)
            array_push(self::$postRoutes, $route);
        }

        static function getRoute(){
            switch ($_SERVER['REQUEST_METHOD']){
                case 'GET':
                    return self::findRoute(self::$getRoutes);
                break;
                case 'POST':
                    return self::findRoute(self::$postRoutes);
                break;
                default:
                    return null;
                break;   
            } 
        }

        private static function findRoute($routes){
        
            $path = $_REQUEST['path'];

            if(substr($path, -1) == '/')
                $path = substr($path, 0, -1);

            $route = null;

            foreach ($routes as $r) {
                if($r->__get('path') == $path){
                        $route = $r;
                        break;
                    }
            }

            return $route;
        }
    }