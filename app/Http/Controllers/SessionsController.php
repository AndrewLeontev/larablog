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
        $this->middleware('guest')->except(['destroy', 'home', 'show', 'edit', 'update']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function edit($name)
    {
        $user = User::where('name', $name)->first();
        if ($user->id != auth()->user()->id) {
            session()->flash('message', 'You don\'t have permission!');
            return redirect ('/home');
        };

        return view('users.edit', compact('user'));
    }

    public function store()
    {

        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Wrong email or password. Please check and try again.'
            ]);
        }
        session()->flash('message', 'You\'re sign up!');
        return redirect()->home();
    }

    public function update(Request $request)
    {

        $user = User::where('name', $request->name)->first();

        if ($user->id != auth()->user()->id) {
            session()->flash('message', 'You don\'t have permission!');
            return redirect ('/home');
        };
        $user->update($request->all());
        
        session()->flash('message', 'User have been updated!');
        return redirect()->home();
    }

    public function home()
    {      
        $posts = Post::latest()->where('user_id', auth()->id())->get();

        return view('users.home', compact('posts'));
    }

    public function show($name)
    {
        $user = User::where('name', $name)->first();
        $posts = Post::latest()->where('user_id', $user->id)->get();
        
        return view('users.show', compact('user', 'posts'));
    }

    public function destroy()
    {
        auth()->logout();
        session()->flash('message', 'Session closed. Goodbye!');
        return redirect('/');
    }
}
