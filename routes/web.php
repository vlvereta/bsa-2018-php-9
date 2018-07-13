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

// General Auth routes

Auth::routes();

Route::get('/currencies', 'HomeController@index')->name('index');

Route::get('/currencies/add', 'HomeController@create')->name('create');

Route::post('/currencies', 'HomeController@store')->name('store');

Route::get('/currencies/{id}', 'HomeController@show')->name('show');

Route::get('/currencies/{id}/edit', 'HomeController@edit')->name('edit');

Route::match(['put', 'patch'], '/currencies/{id]', 'HomeController@update')->name('update');

Route::delete('/currencies/{id}', 'HomeController@destroy')->name('destroy');

// OAuth routes

Route::get('auth/{provider}', 'OAuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'OAuthController@handleProviderCallback');
