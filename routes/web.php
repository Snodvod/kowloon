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

Route::get('/', 'HomeController@index');

Route::post('user/newsletter', 'UserController@newsletter');

Route::get('search', 'SearchController@searchIndex');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'admin'], function() {
       Route::get('/', 'UserController@admin');
    });
});

Route::resource('products', 'ProductController');

Auth::routes();
