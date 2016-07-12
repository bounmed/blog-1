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
Route::post('/search', 'ArticleController@search');
Route::get('/admin', 'AdminController@index');

Route::post('links/new', 'AdminLinkController@new');

Route::post('/admin/new', 'AdminController@new');

Route::get('/edit/{article}', 'AdminController@edit');
Route::get('/article/{article}', 'ArticleController@article');

Route::post('/comment/{article}', 'CommentController@new');
Route::patch('/edit/{article}', 'AdminController@save');