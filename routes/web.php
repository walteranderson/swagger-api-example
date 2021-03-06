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
$router->get('/', function() {
    return 'Hello World';
});

$router->group(['prefix' => 'api/v1'], function() use ($router) {

    $router->get('/cats', 'CatsController@index');
    $router->post('/cats', 'CatsController@create');
    $router->get('/cats/{id}', 'CatsController@show');
    $router->put('/cats/{id}', 'CatsController@update');
    $router->delete('/cats/{id}', 'CatsController@destroy');

    $router->post('/feed', 'FeedingController@index');


    $router->get('/', function () use ($router) {
        return $router->app->version();
    });
});

