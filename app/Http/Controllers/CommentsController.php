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
            'body' => 'required|min:1'
        ]);


        $post->addComment(auth()->id(), auth()->user()->name, auth()->user()->email, request('body'));

        return back();
    }
}
