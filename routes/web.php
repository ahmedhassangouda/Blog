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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/categories', 'CategoriesController');
Route::resource('/posts', 'PostsController');
Route::get('/trashed-posts', 'PostsController@trashedpost')->name('posts.trashed');
Route::get('/posts-restore/{id}','PostsController@postrestore')->name('posts.restor');