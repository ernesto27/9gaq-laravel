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



Route::resource('posts', 'PostController');

Route::get('users/login', 'UserController@loginShow');
Route::post('users/login', 'UserController@loginCreate');
Route::get('users/logout', 'UserController@logout');
Route::resource('users', 'UserController');

