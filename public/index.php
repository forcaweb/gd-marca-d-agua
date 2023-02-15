<?php

require_once '../vendor/autoload.php';

require_once '../app/routes/routes.php';

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);
?>