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


Route::get('/', 'HomeController@index');

Route::prefix('product')->group(function () {

		Route::get('', 'ProductController@adminIndex');

	    Route::get('add', 'ProductController@getAdd');

		Route::post('add', 'ProductController@postAdd');

		Route::get('edit/{id}', 'ProductController@getEdit');

		Route::post('edit', 'ProductController@postEdit');

		Route::get('delete/{id}', 'ProductController@delete');
	});

Route::get('login', 'UserController@getLogin');

Route::prefix('order')->group(function () {
	Route::get('', 'OrderController@index');
	Route::get('add', 'OrderController@getAdd');
	Route::post('add', 'OrderController@postAdd');
});
