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
use Image;
use Auth;
use File;

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

        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {   
        $post = Post::where('slug', $slug)->first();

        return view('post.show', compact('post'));
    }

    public function edit($slug)
    {   
        $post = Post::where('slug', $slug)->first();
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

    public function store(Request $request)
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
                    'slug' => str_replace(" ", "_", request('title')),
                    'body' => request('body'),
                    'category_id' => request('category_id'),
                ]) 
        );

        // dd($request->hasFile('post_image'));
    	if($request->hasFile('post_image')){
    		$post = Post::where('title', request('title'))->first();
            
    		$post_img = $request->file('post_image');
            $filename = time() . '.' . $post_img->getClientOriginalExtension();
            $path = '/uploads/posts/' . $post->slug . '/';
            
            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), $mode = 0777, true, true);
            }
            if (!$post->post_image != 'default.png') {
                File::delete(public_path('/uploads/posts/' .  $user->avatar));
            }

    		Image::make($post_img)->resize(375, 245)->save( public_path($path . $filename ) );

    		$post->post_image = $post->slug . '/' . $filename;
    		$post->save();
    	}

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

        if($request->hasFile('post_image')){
            
    		$post_img = $request->file('post_image');
            $filename = time() . '.' . $post_img->getClientOriginalExtension();
            $path = '/uploads/posts/' . $post->slug . '/';
            
            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), $mode = 0777, true, true);
            }
            if (!$post->post_image != 'default.png') {
                File::delete(public_path('/uploads/posts/' .  $post->post_image));
            }

    		Image::make($post_img)->resize(375, 245)->save( public_path($path . $filename ) );

    		$post->post_image = $post->slug . '/' . $filename;
    		$post->update();
    	}

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

    public function delete($slug)
    {
        
        $post = Post::where('slug', $slug)->first();
        if ($post->user->id != auth()->user()->id) {
            session()->flash('message', 'You don\'t have permission!');
            return back();
        };

        $post->comments()->delete();
        $post->tags()->detach();
        $post->delete();
        session()->flash('message', 'Post has been deleted');
        if (url()->previous() == App::make('url')->to('/profile')) {
            return back();
        }
        return redirect('/home');
    }
}
