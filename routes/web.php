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
use App\Post;

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/search', 'PostsController@search');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@store');

/* 
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/
Route::get('/categories/{category}', function($category) {
    $posts = Post::latest()->where('categories', 'LIKE', '%'. $category .'%')->paginate(10);
    $latest = Post::latest()->take(3)->get();

    return view('posts.index', compact('posts', 'latest'));
});

/* 
|--------------------------------------------------------------------------
| Static pages
|--------------------------------------------------------------------------
*/
Route::get('/about', function () {
    $latest = Post::latest()->take(3)->get();
    return view('static.about', compact('latest'));
});
Route::get('/contacts', function () {
    $latest = Post::latest()->take(3)->get();
    return view('static.contacts', compact('latest'));
});
