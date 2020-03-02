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

Route::get('/','ArticleController@index');
Route::get('/show/{id}','ArticleController@show');
Route::group(['middleware'=>'auth'],function(){
	Route::get('/create','ArticleController@create')->name('create');
	Route::post('/store','ArticleController@store');
	Route::group(['middleware]'=>'authorty'],function(){
		Route::get('show/edit/{id}/','ArticleController@edit')->middleware('authorty');
		Route::put('show/edit/update/{id}','ArticleController@update')->middleware('authorty');
		Route::delete('show/delete/{id}/','ArticleController@destroy')->middleware('authorty');
	});
});