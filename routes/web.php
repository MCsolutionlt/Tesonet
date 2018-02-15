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

Route::get('/tesonet', 'TesonetController@index')->name('home');
Route::get('/tesonet/{user}/{repos}', 'TesonetController@show')->name('repos');
Route::get('/tesonet/{user}/{repos}/issues/{id}', 'TesonetController@issues')->name('issues');