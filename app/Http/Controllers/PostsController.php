<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
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

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }
        $posts = $posts->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {   
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    public function create() 
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store()
    {
        App::setLocale('ru');
        $this->validate(request(), [
            'title' => 'required|min:5|max:255|unique:posts',
            'body' => 'required|min:5|max:50000'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body', 'category_id']))
        );

        return redirect('/');
    }

    public function search()
    {
        $searchstr = request('search');

        $posts = Post::latest()
            ->where('title', 'LIKE', '%'. $searchstr .'%')
            ->orWhere('body', 'LIKE', '%'. $searchstr .'%')
            ->paginate(10);

        return view('posts.search', compact('posts', 'searchstr'));
    }
}
