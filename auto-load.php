<?php
function spl_autoload_register($namespace){
    require_once(__DIR__.$namespace.'.php');
}