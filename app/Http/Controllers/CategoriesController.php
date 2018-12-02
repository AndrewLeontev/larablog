<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function index(Category $category)
    {
        // $posts = $tag->posts;
        $posts = $category->posts()->where('id', $category->id)->paginate(10);

        return view('posts.index', compact('posts'));
    }
}
