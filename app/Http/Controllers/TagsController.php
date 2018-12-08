<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagsController extends Controller
{
    //
    public function index(Tag $tag)
    {
        // $posts = $tag->posts;
        $posts = $tag->posts()->latest()->where('tag_id', $tag->id)->paginate(10);

        return view('posts.index', compact('posts'));
    }
}
