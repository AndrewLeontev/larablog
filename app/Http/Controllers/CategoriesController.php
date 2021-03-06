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
        $posts = $category->posts()->latest()->where('category_id', $category->id)->paginate(10);

        return view('posts.index', compact('posts'));
    }
}
