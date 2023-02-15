<?php

abstract class RouteSwitch
{
    protected function uploadsimgs()
    {
        require 'pages/uploadsImgs/index.php';
    }

    protected function home()
    {
        require 'pages/home.php';
    }

    public function __call($name, $arguments)
    {
        http_response_code(404);
        require 'pages/home.php';
    }
}