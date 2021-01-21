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

$router->group(['prefix' => 'api', 'middleware' => ['client.credentials']], function () use ($router) {

    $router->group(['prefix' => 'film'], function () use ($router) {
        $router->get('/',['uses' =>'Film\FilmController@index']);
        $router->post('/', ['uses' =>'Film\FilmController@store']);
        $router->get('/{film}', ['uses' =>'Film\FilmController@show']);
        $router->get('/actor/{film}', ['uses' =>'Film\FilmController@actorsByFilmId']);
        $router->get('/year/{year}',['uses' =>'Film\FilmController@filmsByYear']);
        $router->put('/{film}', ['uses' =>'Film\FilmController@update']);
        $router->delete('/{film}', ['uses' =>'Film\FilmController@destroy']);
    });

    $router->group(['prefix' => 'actor'], function () use ($router) {
        $router->get('/',['uses' => 'Actor\ActorController@index']);
        $router->post('/',['uses' =>'Actor\ActorController@store']);
        $router->get('/{actor}',['uses' =>'Actor\ActorController@show']);
        $router->put('/{actor}',['uses' =>'Actor\ActorController@update']);
        $router->delete('/{actor}',['uses' =>'Actor\ActorController@destroy']);
    });
});
