<?php

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->filter('auth', function(){
    if(!isset($_SESSION['admin']))
    {
        header('Location: /admin/login');
        return false;
    }
});

include __DIR__ . '/web.php';
include __DIR__ . '/api.php';

$dispatcher = new Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
echo $response;