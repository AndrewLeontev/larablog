<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserFollowed;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function index()
    {   
        if (auth()->check()) {
            $users = User::where('id', '!=', Auth::user()->id)->get();
        } else {
            $users = User::all();
        }
        return view('users.index', compact('users'));
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        if ($follower->nickname == $user->nickname) {
            return back()->withError("You cant't follow yourself");
        }

        if(!$follower->isFollowing($user->nickname)) {
            $follower->follow($user->id);

            $user->notify(new UserFollowed($follower));

            return back()->withSuccess("You are now friends with {$user->nickname}");
        }
        return back()->withError("You are already following {$user->nickname}");
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->nickname)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }
}
