<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'product', 'middleware' => 'api'], function (){
    Route::post('/', 'API\ProductController@store')->middleware('auth:api');
    Route::get('/get', 'API\ProductController@getProductsWithLimit');
    Route::get('/total', 'API\ProductController@getProductsTotal');
    Route::get('/{id}', 'API\ProductController@getProductById')->where('id','[0-9]+');
    Route::patch('/{id}', 'API\ProductController@generateProductionImage')->where('id', '[0-9]+');
    Route::get('/featured', 'API\ProductController@getFeatured');
});

Route::group(['prefix' => 'user', 'middleware' => 'api'], function (){
    Route::post('/login', 'API\AuthController@login');
    Route::post('/signup', 'API\AuthController@regist')->middleware('cors');
    Route::get('/', 'API\UserController@getUserInfoByToken')->middleware('auth:api');
    Route::get('/{id}', 'API\UserController@getUserInfoById')->where('id', '[0-9]+');
    Route::put('/{id}', 'API\UserController@getUserProducts')->where('id', '[0-9]+');
});
