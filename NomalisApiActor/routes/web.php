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
    $router->group(['prefix' => 'actor'], function () use ($router) {
        
$router->get('/',['as' => 'index','uses' => 'Actor\ActorController@index']);
$router->post('/',['as' => 'store','uses' =>'Actor\ActorController@store']);
$router->get('/{actor}',['as' => 'show','uses' =>'Actor\ActorController@show']);
$router->put('/{actor}',['as' => 'update','uses' =>'Actor\ActorController@update']);
$router->delete('/{actor}',['as' => 'destroy','uses' =>'Actor\ActorController@destroy']);
    });
});
