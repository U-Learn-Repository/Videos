<?php



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