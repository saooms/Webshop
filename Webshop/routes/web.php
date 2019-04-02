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
Route::get('/add/{id}', 'CartController@add');
Route::get('cart', 'CartController@show');
Route::get('/remove/{id}', 'CartController@remove');
Route::get('/order', function(){
    return View::make("actions.purchase");
 });
Route::get('/purchase', 'OrderController@store');
Route::get('/orders', 'OrderController@index');
Route::get('/order/{id}', 'OrderController@show');
Route::get('/{class}', 'ArticleController@index');
Route::get('/{class}/{id}', 'ArticleController@show');

