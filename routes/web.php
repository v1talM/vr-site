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
Route::get('/vr/{id}', function ($id){
    return [
        '/img/l1_r_01_01.jpg',
        '/img/l1_l_01_01.jpg',
        '/img/l1_u_01_01.jpg',
        '/img/l1_d_01_01.jpg',
        '/img/l1_f_01_01.jpg',
        '/img/l1_b_01_01.jpg'
    ];
});
Auth::routes();
Route::get('/test', function (){
   return 'called';
});
Route::get('/home', 'HomeController@index');
