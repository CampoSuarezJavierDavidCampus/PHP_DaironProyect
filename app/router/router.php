<?php
namespace App\Routering;
use App\Routering\Route;
use App\View;
class Router {
    private array $routes;
    private array $errores;
    public function add(
        string $method,
        string $path,        
        Controller $controller
    ):Route {
        $route = $this->routes[]= new Route($method, $path, $controller);
        return $route;
    }
    public function dispath(){
        $reques_method=$_SERVER['REQUEST_METHOD']??='GET';
        $reques_path = $_SERVER['REQUEST_URI']??='/';
        try {
            $matching = $this->match($reques_method,$reques_path);
        } catch (\Throwable $th) {
            return $this->dispath_error(500);
        }
    }
    private function match($reques_method,$reques_path):string{
        $is_path_defined = false;
        foreach($routes->route as $i => $route){
            if($route->match($reques_method,$reques_path,$is_path_defined)){
                return $route->render();   
            }
            if($is_path_defined){
               return $this->$this->dispath_error(400);
            }
        }
        return $this->$this->dispath_error(404);
    }
    private function dispath_error($code){
        return View::render_error_page($code);
    }
}
