<?php

$router->get('/', ['Controllers\TaskController', 'viewIndex']);
$router->get('/task/create', ['Controllers\TaskController', 'viewCreate']);

$router->group(['prefix' => 'admin'], function ($router) {
    $router->get('/login', ['Controllers\AdminController', 'viewLogin']);

    $router->group(['before' => 'auth'], function ($router) {
        $router->get('/', ['Controllers\AdminController', 'viewIndex']);
        $router->get('/logout', ['Controllers\AdminController', 'viewLogout']);
        $router->get('/task/edit/{id}', ['Controllers\AdminController', 'viewEdit']);
    });
});

?>