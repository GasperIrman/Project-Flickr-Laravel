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

Route::get('/', 'PostsController@index');

Route::resource('posts', 'PostsController');



Route::post('/edit', 'PostsController@update')->name('edit');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/{id}', 'ProfileController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{id}/{id2}', 'ProfileController@follow');
Route::delete('/users/{id}/{id2}', 'ProfileController@unfollow');