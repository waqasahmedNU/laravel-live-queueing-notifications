<?php

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

$router->group(
    [
        'prefix' => '',
    ],
    function () use ($router) {

        $router->group(['prefix' => '/notification'], function () use ($router){
            $router->post('', 'AppNotificationController@post');
            $router->put('', 'AppNotificationController@put');
            $router->delete('', 'AppNotificationController@delete');
            $router->get('', 'AppNotificationController@get/{id:[0-9]+}');
            $router->get('/all', 'AppNotificationController@getAll');
            $router->put('/read', 'AppNotificationController@read_notification');
        });

    }
);