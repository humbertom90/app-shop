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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/json', 'SearchController@data');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{id}', 'CategoryController@show');

Route::get('/search', 'SearchController@show');


Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products', 'ProductController@index');
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products', 'ProductController@store');
    Route::get('/products/{id}/edit', 'ProductController@edit');
    Route::post('/products/{id}/edit', 'ProductController@update');
    Route::delete('/products/{id}', 'ProductController@destroy');

    Route::get('/products/{id}/images', 'ImageController@index');
    Route::post('/products/{id}/images', 'ImageController@store');
    Route::delete('/products/{id}/images', 'ImageController@destroy');

    Route::get('/products/{id}/images/select/{images}', 'ImageController@select');

    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories', 'CategoryController@store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit');
    Route::post('/categories/{id}/edit', 'CategoryController@update');
    Route::delete('/categories/{id}', 'CategoryController@destroy');

});


