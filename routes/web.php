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

Route::get('/categories/1', 'CategoryController@index')->name('dogs');
Route::get('/categories/2', 'CategoryController@index')->name('cats');
Route::get('/categories/3', 'CategoryController@index')->name('fish');
Route::get('/categories/4', 'CategoryController@index')->name('birds');
Route::get('/categories/5', 'CategoryController@index')->name('small');
Route::get('/categories/6', 'CategoryController@index')->name('other');

Route::post('/categories/{id}/filter', 'CategoryController@filter');


Route::post('user/newsletter', 'UserController@newsletter');
Route::get('/about', 'HomeController@about');
Route::post('/contact', 'HomeController@contact');

Route::get('search', 'SearchController@searchIndex');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.products');
        Route::resource('/products', 'AdminController');
        Route::resource('/faqs', 'FaqController');
        Route::delete('/images/{id}', 'AdminController@deleteImage');
        Route::post('/products/hot', 'AdminController@setHotItems');
    });
});

Route::resource('products', 'ProductController');

Auth::routes();
