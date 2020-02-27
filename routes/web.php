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

// Route::get('/home', 'HomeController@index')->name('home');

//vendor/laravel/framework/src/Illuminate/Routing/Router.php
Auth::routes();


Route::get('/','ArticleController@index');
Route::get('/create','ArticleController@create');//->middleware('auth');添加需要先登入系統才能檢視
Route::post('/store','ArticleController@store');