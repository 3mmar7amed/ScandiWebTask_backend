<?php

namespace app\api;

use app\backend\controller\productController;
use Exception;

class Router
{
    public array $Routes = [];
    public function get($url, $fn)
    {
        $this->Routes[$url] = $fn ;
    }

    public function post($url, $fn)
    {
        $this->Routes[$url] = $fn ;
    }
    public function delete($url , $fn) {
        $this->Routes[$url] = $fn ;
    }

    public function resolve()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        //$controller = new productController() ; 
        //$controller->getProducts() ; 
        call_user_func($this->Routes[$url]) ;
    }

}