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


Route::resource('itemCRUD', 'ItemCRUDController');
Route::resource("todo","TodoController");


Auth::routes();
Route::get('/',"PostController@index");
Route::get('/home',"PostController@index");

Route::resource('posts', 'PostController');
Route::get('b/{slug}','SlugController@slug')->name('slug');
Route::resource("tags","TagController");
Route::resource('categories','CategoryController');
Route::get('profile/{id}','ProfileController@profile')->name('profile')->middleware('auth');
Route::get('profile/{id}/favorites','ProfileController@favorite')->name('favorites')->middleware('auth');
Route::post('profile/{id}/favorites','ProfileController@store')->name('favorites.store');
Route::delete('profile{uid}/favorites/{pid}','ProfileController@destroy')->name(
	'removeFavorite');






