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
//
//Route::get('/', function () {
//    return view('admin/layout/index');
//});
route::get('/login', 'UserController@getLogin');
route::post('/login', 'UserController@postLogin');



//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
