<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy', 'home', 'show']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {

        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Wrong email or password. Please check and try again.'
            ]);
        }
        
        return redirect()->home();
    }

    public function home()
    {      
        $posts = Post::latest()->where('user_id', auth()->id())->get();

        return view('users.home', compact('posts'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::latest()->where('user_id', $user->id)->get();
        
        return view('users.show', compact('user', 'posts'));
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
