<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'clients'], function()
{

    Route::get('new', 'ClientController@showNew');
    Route::get('list', 'ClientController@showList');
    Route::get('edit/{id}', 'ClientController@showEdit');

    Route::post('store', 'ClientController@store');
    Route::post('update/{id}', 'ClientController@update');
    Route::post('delete/{id}', 'ClientController@destroy');

});