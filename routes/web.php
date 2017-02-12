<?php

Route::resource('posts', 'PostController');

Route::get('users/login', 'UserController@loginShow');
Route::post('users/login', 'UserController@loginCreate');
Route::get('users/logout', 'UserController@logout');
Route::resource('users', 'UserController');
Route::resource('comments', 'CommentController');

Route::get('images/app/public/images/{filename}', function ($filename)
{
	$path = storage_path() . '/app/public/images/' . $filename;
 	if(!File::exists($path)) abort(404);

 	$file = File::get($path);
 	$type = File::mimeType($path);

 	$response = Response::make($file, 200);
 	$response->header("Content-Type", $type);

 	return $response;
});

