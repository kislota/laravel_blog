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

//Route::get('/', 'PostsController@index');
//
//Route::get('/post/create', 'PostsController@create');
//
//Route::post('/post', 'PostsController@saveNew');
//
//Route::get('/post/{post}', 'PostsController@view');
//
//Route::get('/post/{post}/edit', 'PostsController@edit');

Route::resource('post', 'PostsController');