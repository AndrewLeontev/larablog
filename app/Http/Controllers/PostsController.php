<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    public function index() 
    {
        $posts = Post::latest();
        $latest = Post::latest()->take(3)->get();

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }
        $posts = $posts->paginate(10);

        return view('posts.index', compact('posts', 'latest'));
    }

    public function show($id)
    {   
        $post = Post::find($id);
        $latest = Post::latest()->take(3)->get();

        return view('post.show', compact('post', 'latest'));
    }

    public function create() 
    {
        $latest = Post::latest()->take(3)->get();
        return view('posts.create', compact('latest'));
    }

    public function store()
    {
        App::setLocale('ru');
        $this->validate(request(), [
            'title' => 'required|min:5|max:255|unique:posts',
            'body' => 'required|min:5|max:50000'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body', 'categories']))
        );

        return redirect('/');
    }

    public function search()
    {
        $latest = Post::latest()->take(3)->get();
        $searchstr = request('search');

        $posts = Post::latest()
            ->where('title', 'LIKE', '%'. $searchstr .'%')
            ->orWhere('body', 'LIKE', '%'. $searchstr .'%')
            ->paginate(10);

        return view('posts.search', compact('posts', 'latest', 'searchstr'));
    }
}
