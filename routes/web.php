<?php

use App\Post;

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
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/tags/{tag}', 'TagsController@index');
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/search', 'PostsController@search');

Route::get('/posts/{id}/delete', 'PostsController@delete');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::patch('/posts/{id}', 'PostsController@update');

/* 
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/user/edit/{name}', 'SessionsController@edit');
Route::patch('/users/{name}', 'SessionsController@update');

Route::get('/users', 'SessionsController@showall');
Route::get('/users/{id}', 'SessionsController@show');
Route::get('/home', 'SessionsController@home')->name('home');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

/* 
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function() {
    Route::get('/', 'AdminController@index');
});

/* 
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/
Route::get('/categories/{category}', 'CategoriesController@index');

/* 
|--------------------------------------------------------------------------
| Static pages
|--------------------------------------------------------------------------
*/
Route::get('/about', function () {
    return view('static.about');
});
Route::get('/contacts', function () {
    return view('static.contacts');
});

/* 
|--------------------------------------------------------------------------
| Others
|--------------------------------------------------------------------------
*/