<?php

namespace app\api;
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
        $url = $_SERVER['PATH_INFO'] ?? '/';
        call_user_func($this->Routes[$url]) ;
    }

}