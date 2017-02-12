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


Route::get('images/app/public/images/{filename}', function ($filename)
{
 $path = storage_path() . '/app/public/images/' . $filename;
 //return $path;

 if(!File::exists($path)) abort(404);

 $file = File::get($path);
 $type = File::mimeType($path);

 $response = Response::make($file, 200);
 $response->header("Content-Type", $type);

 return $response;
});

