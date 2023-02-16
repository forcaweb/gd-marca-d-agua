<?php

require_once 'RouteSwitch.php';

class Router extends RouteSwitch
{
    public function __construct(){
        define('URL', 'http://localhost/gd');
        $url = URL.DIRECTORY_SEPARATOR;
    }

    public function run(string $requestUri)
    {
        $route = substr($requestUri, 0);
        if (empty($route)) {
            $this->home();
        } else {
            $this->$route();
        }
    }
}