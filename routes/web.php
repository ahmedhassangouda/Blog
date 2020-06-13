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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/categories', 'CategoriesController');

    Route::resource('/posts', 'PostsController');
    Route::get('/trashedposts', 'PostsController@trashedpost')->name('posts.trashed');
    Route::get('/posts/restore/{id}','PostsController@postrestore')->name('posts.restor');

    Route::resource('/tags', 'TagsController');

    Route::get('/users','UsersController@index')->name('user.index')->middleware('admin');
    Route::post('/users/role/{user}','UsersController@changerole')->name('user.change-role')->middleware('admin');
    
    Route::get('/profile/{user}','ProfileController@getprofile')->name('user.profile');
    Route::get('/profile/edit/{user}','ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update/{profile}','ProfileController@update')->name('profile.update');


});

