<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserFollowed;
use App\User;
use Auth;
use Hash;

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

    public function changePassword($nickname) 
    {
        $user = User::where('nickname', $nickname)->first();
        if ($user != auth()->user()) {
            session()->flash('message', 'You don\'t have permissions');
            return redirect('home');
        }
        return view('users.changepassword', compact('user'));
    }

    public function storePassword($nickname)
    {
        $user = User::where('nickname', $nickname)->first();

        if ($user->id != auth()->user()->id) {
            session()->flash('message', 'You don\'t have permission!');
            return redirect ('/home');
        };

        $oldpwd = request('old_password');
        
        if (Hash::check($oldpwd, $user->password)) {
            $password = bcrypt(request('password'));
            $user->update([
                'password' => $password
            ]);
            session()->flash('message', 'User have been updated!');
            return redirect()->home();
        } else {
            session()->flash('message', 'Wrong password!');
            return back()->withErrors([
                'message' => 'Wrong password. Please check and try again.'
            ]);
        } 
    }

    public static function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }
}
