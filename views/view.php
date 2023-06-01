<?php
namespace App\View;
class View{
    private string $path;
    public function __construct(
        private array $vars = [],        
    ){}

    public function set_path(string $path){
        $this->path = $path;
    }

    public function render($path){
        extract($vars);
        ob_start();
        include_once __DIR__."../view/sources/".$this->path.'.php';
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }
}