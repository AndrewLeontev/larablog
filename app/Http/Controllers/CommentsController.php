<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App;

class CommentsController extends Controller
{
    //
    public function store(Post $post)
    {
        $this->validate(request(), [
            'name' => 'required|min:5|max:26',
            'email' => 'required|min:5|max:80|email',
            'body' => 'required|min:1'
        ]);

        $post->addComment(request('name'), request('email'), request('body'));

        return back();
    }
}
