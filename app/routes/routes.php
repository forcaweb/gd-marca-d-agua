<?php

require_once 'RouteSwitch.php';

class Router extends RouteSwitch
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 4);
        if ($route === '') {
            $this->home();
        } else {
            $this->$route();
        }
    }
}