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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/contact', 'PagesController@contact');

Route::resource('posts', 'PostsController');
Route::get('/posts/{id}/sell', 'PostsController@sell');

Route::get('/browse', 'PagesController@browse');
Route::post('/browse', 'PagesController@browse');
Route::get('/browse/{vin}', 'PagesController@browseShow');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');