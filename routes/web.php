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

// Route::get('/', function () {
//     return view('home');
// });

//路徑:vendor/laravel/framework/src/Illuminate/Routing/Router.php
Auth::routes();

Route::get('/create','ArticleController@create')->middleware('auth')->name('create');//添加後需要先登入系統才能檢視
Route::get('/','ArticleController@index');
Route::post('/store','ArticleController@store');
Route::get('/show/{id}','ArticleController@show');
Route::get('show/edit/{id}/','ArticleController@edit');
Route::put('show/edit/update/{id}','ArticleController@update');
Route::delete('show/delete/{id}/','ArticleController@destroy');