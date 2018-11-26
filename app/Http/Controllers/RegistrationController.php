<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class RegistrationController extends Controller
{
    //
    public function create()
    {

        return view('registration.create');
    }

    public function store()
    {
        // Validation ...
        $this->validate(request(), [
            'name' => 'required|min:3|max:25',
            'email' => 'email|required|min:5|max:255|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        // Create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // Sign them in
        auth()->login($user);

        // Redirect to Home page
        return redirect()->home();
    }
}