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

Route::get('/index', 'HelloController@index');

Route::get('/login', 'LoginController@index');

Route::get('/videolist', 'VideolistController@index');

Route::get('/videolistup', 'VideolistupController@index');

Route::get('/videoiddel', 'VideolistupController@videoiddel');

Route::get('/videoidins', 'VideolistupController@videoidins');

Route::get('/videosearch', 'VideosearchController@index');

Route::get('/search', 'VideosearchController@search');

Route::post('/loginchk', 'LoginchkController@index');

