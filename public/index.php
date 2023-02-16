<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../app/routes/routes.php';
$url = isset($_GET['url']) ? $_GET['url'] : '';
$router = new Router;
$router->run($url);
?>