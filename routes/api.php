<?php

$router->group(['prefix' => 'api'], function ($router) {
    $router->group(['prefix' => 'task'], function ($router) {
        $router->get('list', ['Controllers\TaskController', 'getList']);
        $router->post('save', ['Controllers\TaskController', 'onStore']);
    });

    $router->group(['prefix' => 'admin'], function ($router) {
        $router->post('login', ['Controllers\AdminController', 'login']);
        $router->group(['before' => 'auth'], function ($router) {
            $router->get('taskList', ['Controllers\AdminController', 'getList']);
            $router->post('logout', ['Controllers\AdminController', 'logout']);
            $router->post('taskEdit', ['Controllers\AdminController', 'onUpdate']);
        });
    });
});

?>