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

// // test try routes
// Route::get('/test',function(){
// 	return 'Hello test!';
// });

// Route::get('/', function () {
//     return view('welcome');
//     // return view('home');
// });

//vendor/laravel/framework/src/Illuminate/Routing/Router.php
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','ArticleController@index');
// Route::get('/create','ArticleController@create');
