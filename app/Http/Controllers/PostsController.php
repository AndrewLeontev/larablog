<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    public function index(Posts $posts) 
    {
        $posts = $posts->all();
        // $posts = (new \App\Repositories\Posts)->all();

        // $posts = Post::latest()
        //     ->filter(request()->only(['month', 'year']))
        //     ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {   
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    public function edit($id)
    {   
        $post = Post::find($id);
        $categories = Category::all();

        if ($post->user()->first()->id != auth()->user()->id) {
            session()->flash('message', 'You don\'t have permission!');
            return back();
        };

        return view('post.edit', compact('post', 'categories'));
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
            new Post(
                [
                    'title' => request('title'),
                    'body' => request('body'),
                    'category_id' => request('category_id'),
                ]) 
        );

        preg_match_all('/[^\W\d][\w]*/', request('tags'), $newTags);
        $post = Post::where('title', request(['title']))->first();
        foreach ($newTags as $tagList) {
           foreach ($tagList as $tag) {
                $dbTag = Tag::firstOrCreate(
                    ['name' => $tag]
                );
                if (!$post->tags()->where('id', $dbTag->id)->first()) {
                    $post->tags()->attach([$dbTag->id]);
                }
           }
        };

        session()->flash('message', 'Post have been created!');
        return redirect('/');
    }

    public function update(Request $request)
    {
        $post = Post::where('id', $request->id)->first();

        if ($post->user()->first()->id != auth()->user()->id) {
            session()->flash('message', 'You don\'t have permission!');
            return redirect ('/posts/' . $request->id);
        };

        $post->update($request->only('title', 'body', 'category_id'));
        
        preg_match_all('/[^\W\d][\w]*/', request('tags'), $newTags);
        $post->tags()->detach();
        foreach ($newTags as $tagList) {
           foreach ($tagList as $tag) {
                $dbTag = Tag::firstOrCreate(
                    ['name' => $tag]
                );
                if (!$post->tags()->where('id', $dbTag->id)->first()) {
                    $post->tags()->attach([$dbTag->id]);
                }
           }
        };

        session()->flash('message', 'Post have been updated!');
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

    public function delete($postId)
    {
        $post = Post::find($postId);

        if ($post->user()->first()->id != auth()->user()->id) {
            session()->flash('message', 'You don\'t have permission!');
            return back();
        };

        $post->comments()->delete();
        $post->tags()->detach();
        $post->delete();
        session()->flash('message', 'Post has been deleted');
        return redirect('/');
    }
}
