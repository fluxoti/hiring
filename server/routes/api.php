<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->get('/', function () {
    echo 'v1';
});

$router->group(['prefix' => 'v1', 'namespace' => 'V1'], function () use ($router) {
    $router->get('items/{type}', 'ItemsController@index')
        ->where('type', 'top|new|best|ask|show|job');
    $router->get('items/{id}', 'ItemsController@show');
    $router->get('items/last', 'ItemsController@lastId');

    $router->get('users/{username}', 'UsersController@show');
});
