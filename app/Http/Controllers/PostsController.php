<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App;

class PostsController extends Controller
{
    //

    public function index() 
    {
        $posts = Post::latest()->paginate(10);
        $latest = Post::latest()->take(3)->get();

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

    public function store(Request $request)
    {
        App::setLocale('ru');
        $validatedData = $request->validate([
            'title' => 'required|min:5|max:255|unique:posts',
            'body' => 'required|min:5|max:50000'
        ]);
        
        Post::create(request(['title', 'body', 'categories']));

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
