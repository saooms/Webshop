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
Route::get('/add/{id}', 'CartController@add')->name('add');
Route::get('cart', 'CartController@show')->name('cart.show');
Route::get('/remove/{id}', 'CartController@remove')->name('remove');
Route::get('/placeOrder', function(){
    return View::make("actions.purchase");
 });    
Route::get('/purchase', 'OrderController@store');
Route::get('/orders', 'OrderController@index')->name('orders.all');
Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
Route::get('/category/{class}', 'ArticleController@index')->name('category');
Route::get('/category/{class}/{id}', 'ArticleController@show')->name('article.show');

