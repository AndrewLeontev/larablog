<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Post;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function showUsers()
    {
        return view('admin.data.users');
    }

    public function showPosts()
    {
        return view('admin.data.posts');
    }

    public static function getUsersData(Datatables $datatables) 
    {
        return $datatables->eloquent(User::query())
                          ->editColumn('name', function ($user) {
                              return '<a>' . $user->name . '</a>';
                          })
                          ->addColumn('action', 'admin.tables.users-action')
                          ->rawColumns(['name', 'action'])
                          ->make(true);
    }

    public static function getPostsData(Datatables $datatables) 
    {
        return $datatables->eloquent(Post::query())
                          ->editColumn('user_id', function ($post) {
                              return view('admin.tables.posts.user-post', compact('post'));
                          })
                          ->editColumn('title', function ($post) {
                              return view('admin.tables.posts.title-post', compact('post'));
                          })
                          ->editColumn('category_id', function ($post) {
                              return view('admin.tables.posts.category-post', compact('post'));
                          })
                          ->editColumn('body', function ($post) {
                              return '<div style="max-width: 50px">' . substr($post->body, 0, 200) . '</div>';
                          })
                          ->addColumn('action', 'admin.tables.users-action')
                          ->rawColumns(['title', 'action', 'user_id', 'category_id', 'body'])
                          ->make(true);
    }
}
