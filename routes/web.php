<?php

use Illuminate\Support\Facades\Route;

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

// 首页
Route::get('/', 'HomeController@index');

// Home 路由组
Route::group(['prefix' => 'main'], function () {

});

// Manage 路由组
Route::group(['prefix' => 'manage'], function () {
    Route::get('/', 'ManageController@index');
    Route::any('login', 'ManageController@login');
    Route::get('logout', 'ManageController@logout');
});

// Serving 路由组
Route::group(['prefix' => 'serving'], function () {

});