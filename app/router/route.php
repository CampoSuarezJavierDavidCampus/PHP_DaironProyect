<?php
namespace App\Routering;
class Route{
    protected string $name;
    public function __construct(
        protected string $method,   
        protected Controller $controller
    ){}

    public function set_nombre(string $name){        
        $this->name = strtolower(trim($this->name));
        if(strlen($this->name)==0){
            throw Exception('NOMBRE NO VALIDO');
        }
    }
    public function get_nombre():string{
        return $this->name;
    }
    public function match($request_method,$request_path,&$is_path_defined):bool{
        if($request_path === $this->path){
            $is_path_defined = true;
            if($request_method === $this->method){
                return true;
            }
        }
        return false;
    }
    public function  render():View{
        $this->controller->set_name($this->name);
        return $this->controller->view->render();
    }
}