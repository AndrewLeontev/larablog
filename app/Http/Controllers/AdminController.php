<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Post;
use App\Tag;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.data.users', compact('users'));
    }

    public function showComments()
    {
        return view('admin.data.comments', ['comments' => App\Comments::all()]);
    }

    public function showTags()
    {
        return view('admin.data.tags', ['tags' => App\Tags::all()]);
    }

    public function showPosts()
    {
        $posts = Post::all();
        return view('admin.data.posts', compact('posts'));
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
                              return '<div style="max-width: 150px; overflow:hidden;
                              text-overflow: ellipsis;">' . substr($post->body, 0, 200) . '</div>';
                          })
                          ->addColumn('action', function($post) {
                              return '<a href="/posts/' . $post->slug . '/edit"><i class="fas fa-edit"></i></a>
                              <a href="/posts/' . $post->slug . '/delete"><i class="fas fa-trash-alt"></i></a>
                              ';
                          })
                          ->rawColumns(['title', 'action', 'user_id', 'category_id', 'body'])
                          ->make(true);
    }

    public function deleteUser($nickname)
    {
        $user = User::where('nickname', $nickname)->first();
        if ($user != auth()->user()) {
            $posts = $user->posts()->get();
            foreach ($posts as $post) {
                $post->tags()->detach();
            }
            Tag::doesntHave('posts')->delete();
            
            $user->posts()->delete();
            $user->comments()->delete();
            $user->delete();

            session()->flash('massage', 'User have been deleted!');
            return back();
        } else {
            session()->flash('massage', 'You cannot delete yourself');
            return back();
        }
    }
}
