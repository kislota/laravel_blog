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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/post','PostsController');

Route::get('/', 'PostsController@redirect');

//Route::get('/', 'PostsController@index');
//
//Route::get('/create', 'PostsController@create');
//
//Route::post('/', 'PostsController@store');
//
//Route::get('/{post}', 'PostsController@show');
//
//Route::get('/edit/{post}', 'PostsController@edit');
//
//Route::put('/{post}', 'PostsController@update');
//
//Route::delete('/{post}', 'PostsController@destroy');
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
