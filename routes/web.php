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

Route::get('/', 'PublicController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/store', 'HomeController@store');
Route::get('/home/product/{id}', 'HomeController@view');
Route::put('/home/product/{id}', 'HomeController@update');
Route::delete('/home/product/{id}', 'HomeController@destroy');