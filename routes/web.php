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

Route::delete('/posts/{id}/delete', 'PostsController@destroy')->name('posts.destroy');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::patch('/posts/{id}', 'PostsController@update');

/* 
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/profile', 'SessionsController@profile');
Route::patch('/profile', 'SessionsController@update_avatar');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/users', 'UsersController@index')->name('users');
Route::group(['middleware' => 'auth'], function() {
    Route::post('/users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('/users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
    Route::get('/notifications', 'UsersController@notifications')->name('notify');
});

Route::get('/user/edit/{name}', 'SessionsController@edit');
Route::patch('/users/{name}', 'SessionsController@update');

// Route::get('/users', 'SessionsController@showAll');
Route::get('/user/{nickname}/password', 'UsersController@changePassword');
Route::patch('/user/{nickname}/password', 'UsersController@storePassword');
Route::get('/users/all', 'SessionsController@getUsersData');
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
    Route::get('users', 'AdminController@showUsers');
    Route::get('posts', 'AdminController@showPosts');
    Route::get('users/data', 'AdminController@getUsersData');
    Route::get('posts/data', 'AdminController@getPostsData');
    Route::delete('user/{nickname}/delete', 'AdminController@deleteUser')->name('admin.deleteuser');
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
Route::get('/tags/all', 'TagsController@all');

/* 
|--------------------------------------------------------------------------
| Others
|--------------------------------------------------------------------------
*/
Route::get('/404', ['as' => '404', 'uses' => 'ErrorsController@notFound']);