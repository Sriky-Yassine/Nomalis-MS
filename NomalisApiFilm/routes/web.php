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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'film'], function () use ($router) {
        
$router->get('/',['as' => 'index','uses' =>'Film\FilmController@index']);
$router->post('/', ['as' => 'store','uses' =>'Film\FilmController@store']);
$router->get('/{film}', ['as' => 'show','uses' =>'Film\FilmController@show']);
$router->get('/year/{year}',['as' => 'filmByYear','uses' =>'Film\FilmController@filmsByYear']);
$router->put('/{film}', ['as' => 'update','uses' =>'Film\FilmController@update']);
$router->delete('/{film}', ['as' => 'destroy','uses' =>'Film\FilmController@destroy']);
    });
});


