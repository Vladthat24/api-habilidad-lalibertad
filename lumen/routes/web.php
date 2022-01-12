<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "/v1", "middleware" => "auth"], function () use ($router) {

    $router->group(["prefix" => "/user"], function () use ($router) {

        $router->post('/register', "UserController@createUser");
        $router->get('/list', 'UserController@getListUser');
        $router->put('/{id}', 'UserController@putUser');
        $router->get('/{id}', 'UserController@getUserById');
        $router->delete('/{id}', 'UserController@deleteUser');
        $router->get('/{id}/restore', 'UserController@restoreUser');
    });
});

$router->group(["prefix" => "/v2", "middleware" => "auth"], function () use ($router) {
    $router->group(["prefix" => "/consulta"], function () use ($router) {
        $router->post('/pago', "ConsultaController@postConsultaPago");
    });
});

$router->group(["prefix" => "/v3", "middleware" => "auth"], function () use ($router) {
    $router->group(["prefix" => "/consulta"], function () use ($router) {
        $router->get('/habilidad', "ConsultaDriveController@postConsulta");
    });
    $router->group(["prefix" => "/getConsultaFileGetContents"], function () use ($router) {
        $router->get('/habilidad', "ConsultaDriveController@getConsulta");
    });


});
