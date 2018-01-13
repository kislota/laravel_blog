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

Route::resource('/posts','PostsController');
Route::resource('/filters','FiltersController');
Route::resource('/likes','LikesController');
Route::resource('/comments','CommentsController');
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('/','AdminController');
});

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

//Route::get('/', 'PostsController@redirect');

