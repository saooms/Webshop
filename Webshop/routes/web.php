<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{class}', 'ArticleController@index');
Route::get('/{class}/{id}', 'ArticleController@show');
// Route::get('/fire', 'FireController@index');
// Route::get('/fire/{id}', 'FireController@show');
// Route::get('/water', 'WaterController@index');
// Route::get('/water/{id}', 'WaterController@show');
// Route::get('/grass', 'GrassController@index');
// Route::get('/grass/{id}', 'GrassController@show');
// Route::get('/flight', 'FlightController@index');
// Route::get('/flight/{id}', 'FlightController@show');
// Route::get('/ghost', 'GhostController@index');
// Route::get('/Ghost/{id}', 'GhostController@show');

