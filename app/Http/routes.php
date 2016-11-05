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
    return view('master');
});

Route::get('/api/v1/users/{id?}', 'Users@index');
Route::post('/api/v1/users', 'Users@store');
Route::post('/api/v1/users/login', 'Users@login');
Route::post('/api/v1/users/logout', 'Users@logout');
Route::post('/api/v1/users/{id}', 'Users@update');

Route::get('/api/v1/citys/{id}', 'Citys@get');
