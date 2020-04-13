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

$router->group(['prefix'=>'api/v1'], function() use($router){
    $router->get('/video', 'VideoController@index');
    $router->post('/video', 'VideoController@create');
    $router->get('/video/{id}', 'VideoController@show');
    $router->post('/video/edit/{id}', 'VideoController@update');
    $router->delete('/video/{id_video}', 'VideoController@delete');
});