<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::post('/login', 'API\AuthController@login');
Route::post('/signup', 'API\AuthController@regist');
Route::get('/spider', 'SpiderController@spider');
Route::get('/get', 'SpiderController@getImage');
Route::get('/craw', 'SpiderController@crawImage');
Route::get('/test', function () {
   $img = \Intervention\Image\Facades\Image::make('uploads/test.jpeg');
    dd($img);
});