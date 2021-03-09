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

/*criando um grupo para adicionar o prefixo /api*/
$router->group(['prefix'=>'/api'], function () use($router){
    //todas as rotas dentro deste bloco terão o prefixo api

    //criando grupo com prefixo series
    $router->group(['prefix'=>'/series'], function() use($router){
        $router->get('', 'SeriesController@index');
        $router->get('/{id}', 'SeriesController@show');
        $router->post('', 'SeriesController@store');
        $router->put('/{id}', 'SeriesController@update');
        $router->delete('/{id}', 'SeriesController@destroy');
    });

    //criando grupo com prefixo de episodios
    $router->group(['prefix'=>'/episodios'], function() use($router){
        $router->get('', 'EpisodiosController@index');
        $router->get('/{id}', 'EpisodiosController@show');
        $router->post('', 'EpisodiosController@store');
        $router->put('/{id}', 'EpisodiosController@update');
        $router->delete('/{id}', 'EpisodiosController@destroy');
    });

});

