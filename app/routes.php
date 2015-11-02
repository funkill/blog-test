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

Route::get('/login', [
    'as' => 'login_page',
    'uses' => 'Blog\Controller\AdminPanel\AuthController@loginPage',
]);

/** == Login == */
Route::post('/login', [
    'as' => 'login',
    'uses' => 'Blog\Controller\AdminPanel\AuthController@login',
    'before' => ['csrf'],
]);

/* == Admin panel == */
Route::get('/admin', [
    'as' => 'admin_main',
    'uses' => 'Blog\Controller\AdminPanel\AuthController@main',
    'before' => ['auth'],
]);

/* === Users === */
Route::get('/admin/users', [
    'as' => 'admin_users',
    'uses' => 'Blog\Controller\AdminPanel\UsersController@users',
    'before' => ['auth'],
]);

Route::post('/admin/users', [
    'as' => 'admin_create_user',
    'uses' => 'Blog\Controller\AdminPanel\UsersController@createUser',
    'before' => ['auth'],
])
    ->where(['user' => '\d+'])
;

Route::post('/admin/users/{user}/edit', [
    'as' => 'admin_update_user',
    'uses' => 'Blog\Controller\AdminPanel\UsersController@updateUser',
    'before' => ['auth'],
])
    ->where(['user' => '\d+'])
;

Route::post('/admin/users/{user}/delete', [
    'as' => 'admin_delete_user',
    'uses' => 'Blog\Controller\AdminPanel\UsersController@deleteUser',
    'before' => ['auth'],
])
    ->where(['user' => '\d+'])
;

/* === Tags === */
Route::get('/admin/tags', [
    'as' => 'admin_tags',
    'uses' => 'Blog\Controller\AdminPanel\TagsController@tags',
    'before' => ['auth'],
]);

Route::post('/admin/tags', [
    'as' => 'admin_create_tag',
    'uses' => 'Blog\Controller\AdminPanel\TagsController@createTag',
    'before' => ['auth'],
])
    ->where(['tag' => '\d+'])
;

Route::post('/admin/tags/{tag}/edit', [
    'as' => 'admin_update_tag',
    'uses' => 'Blog\Controller\AdminPanel\TagsController@updateTag',
    'before' => ['auth'],
])
    ->where(['tag' => '\d+'])
;

Route::post('/admin/tags/{tag}/delete', [
    'as' => 'admin_delete_tag',
    'uses' => 'Blog\Controller\AdminPanel\TagsController@deleteTag',
    'before' => ['auth'],
])
    ->where(['tag' => '\d+'])
;

/* === Posts === */
Route::get('/admin/posts', [
    'as' => 'admin_posts',
    'uses' => 'Blog\Controller\AdminPanel\PostsController@posts',
    'before' => ['auth'],
]);

Route::get('/admin/posts/new', [
    'as' => 'admin_post_create_page',
    'uses' => 'Blog\Controller\AdminPanel\PostsController@newPost',
    'before' => ['auth'],
])
    ->where(['post' => '\d+'])
;

Route::post('/admin/posts/new', [
    'as' => 'admin_create_post',
    'uses' => 'Blog\Controller\AdminPanel\PostsController@createPost',
    'before' => ['auth'],
])
    ->where(['post' => '\d+'])
;

Route::get('/admin/posts/{post}', [
    'as' => 'admin_post',
    'uses' => 'Blog\Controller\AdminPanel\PostsController@post',
    'before' => ['auth'],
])
    ->where(['post' => '\d+'])
;

Route::post('/admin/posts/{post}', [
    'as' => 'admin_update_post',
    'uses' => 'Blog\Controller\AdminPanel\PostsController@updatePost',
    'before' => ['auth'],
])
    ->where(['post' => '\d+'])
;

Route::post('/admin/posts/{post}/delete', [
    'as' => 'admin_delete_post',
    'uses' => 'Blog\Controller\AdminPanel\PostsController@deletePost',
    'before' => ['auth'],
])
    ->where(['post' => '\d+'])
;

Route::get('/403', [
    'as' => '403',
    'uses' => 'Blog\Controller\Errors@e403',
]);