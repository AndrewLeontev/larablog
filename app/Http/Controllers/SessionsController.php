<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Post;
use App\User;
use Hash;
use Image;
use Auth;
use File;


class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except([
            'destroy', 
            'home', 
            'show', 
            'edit', 
            'update', 
            'profile', 
            'update_avatar',
            'showAll',
            'getUsersData'
            ]);
    }

    public function create()
    {
        if (auth()->check()) {
            redirect ('/home');
        }
        return view('sessions.create');
    }

    public function edit($nickname)
    {
        $user = User::where('nickname', $nickname)->first();
        if (!Auth::check() && $user->id != Auth::id()) {
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

        $pwd = request('password');
        
        if (Hash::check($pwd, $user->password)) {
            $user->update($request->only('name', 'email'));
            session()->flash('message', 'User have been updated!');
            return redirect()->home();
        } else {
            session()->flash('message', 'Wrong password!');
            return back()->withErrors([
                'message' => 'Wrong password. Please check and try again.'
            ]);
        } 
    }

    public function home()
    {      
        $posts = Post::latest()->where('user_id', auth()->id())->get();

        return view('users.home', compact('posts'));
    }

    public function show($nickname)
    {
        $user = User::where('nickname', $nickname)->first();
        $posts = Post::latest()->where('user_id', $user->id)->get();
        
        return view('users.show', compact('user', 'posts'));
    }

    public function destroy()
    {
        auth()->logout();
        session()->flash('message', 'Session closed. Goodbye!');
        return redirect('/');
    }

    public function profile()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('users.profile', array('user' => auth()->user(), 'posts' => auth()->user()->posts()->paginate(10)));
    }

    public function update_avatar(Request $request)
    {
        // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$user = Auth::user();
            
    		$avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = '/uploads/avatars/' . $user->nickname . '/';
            
            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), $mode = 0777, true, true);
            }
            if (!$user->avatar != 'default.png') {
                File::delete(public_path('/uploads/avatars/' .  $user->avatar));
            }

    		Image::make($avatar)->save( public_path($path . $filename ) );

    		$user->avatar = $user->nickname . '/' . $filename;
    		$user->save();
    	}

    	return view('users.profile', array('user' => Auth::user(), 'posts' => Auth::user()->posts()->paginate(10)) );
    }
 
    public function showAll() 
    {
        $users = User::orderBy('nickname', 'asc')->paginate(20);

        return view('users.all', compact('users'));
    }

    public static function getUsersData(Datatables $datatables) 
    {
        return $datatables->eloquent(User::query())
                          ->editColumn('avatar', function ($user) {
                              return '<img src="uploads/avatars/' . $user->avatar . '" style="max-width: 50px;" class="image-responsive">';
                          })
                          ->editColumn('nickname', function ($user) {
                              return '<a href="/users/' . $user->nickname . '">' . $user->nickname . '</a>';
                          })
                          ->editColumn('posts', function ($user) {
                              return count($user->posts);
                          })
                          ->editColumn('created_at', function ($user) {
                              return $user->created_at->toFormattedDateString();
                          })
                          ->rawColumns(['avatar', 'nickname', 'posts', 'created_at'])
                          ->make(true);
    }
}
