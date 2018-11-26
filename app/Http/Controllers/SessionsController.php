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
        $this->middleware('guest')->except(['destroy', 'home']);
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
        return view('users.home');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
