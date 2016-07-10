<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'ArticleController@welcome');
Route::get('/article/{article}', 'ArticleController@article');
Route::post('/search', 'ArticleController@search');

Route::post('/article/{article}/comment', 'CommentController@new');

Route::get('/admin', 'AdminController@index');
Route::get('/article/edit/{article}', 'AdminController@edit');
Route::patch('/article/edit/{article}', 'AdminController@save');
Route::post('/article/new/', 'AdminController@new');

