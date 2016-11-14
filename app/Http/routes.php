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

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('master');
});

//API for User table
Route::get('/api/v1/users/{id?}', 'Users@index');
Route::post('/api/v1/users', 'Users@store');
Route::post('/api/v1/users/login', 'Users@login');
Route::post('/api/v1/users/logout', 'Users@logout');
Route::post('/api/v1/users/{id}', 'Users@update');
Route::get('/api/v1/users/deleteDirectory/{email}', 'Users@deleteDirectory');

//API for city table
Route::get('/api/v1/citys/{id}', 'Citys@get');

//API for genre table
Route::get('/api/v1/genres/{id}', 'Genres@get');

//API for song table
Route::post('/api/v1/songs', 'Songs@store');
Route::get('/api/v1/songs/getUserSongs', 'Songs@getUserSongs');
Route::get('/api/v1/songs/softDelete/{id}', 'Songs@softDelete');
Route::get('/api/v1/songs/getNewSongs', 'Songs@getNewSongs');

//API for playlist table
Route::post('/api/v1/playlists', 'Playlists@store');
Route::get('/api/v1/playlists/getUserPlaylists', 'Playlists@getUserPlaylists');
Route::get('/api/v1/playlists/softDelete/{id}', 'Playlists@softDelete');


