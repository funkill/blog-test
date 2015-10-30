<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'main',
    'uses' => 'Blog\Controller\PostsController@posts'
]);

Route::get('/posts', [
    'as' => 'posts',
    'uses' => 'Blog\Controller\PostsController@posts'
]);

Route::get('/posts/{post}', [
    'as' => 'post',
    'uses' => 'Blog\Controller\PostsController@post'
])
    ->where(['post' => '[\d\w\-\_\.]+'])
;