<?php 
namespace App\Core;

class Application {
    
    private $view;
    
    function __construct(){
    }

    public function execute(){
        
        $route = Router::getRoute();

        if($route == null)
        {
            $notFound =  new View('404');
            $notFound->render();
            return;
        }
        
        $controllerName = $route->__get('controller');
        $class = '\App\Controllers\\'.$controllerName.'Controller';
        try{
            $controller = new $class();
        } catch(Exception $e){
            echo "<div style='text-align:center'><h3>Cant find controller!<h3></div>";
            exit();
        }

        try{
            $this->view = call_user_func(array($controller, $route->action));
        } catch(Exception $e){
            echo "<div style='text-align:center'><h3>No action!<h3></div>";
            exit();
        }

        $this->view->render();

   }
}