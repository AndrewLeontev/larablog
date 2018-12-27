<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermissionsTrait;
use Yajra\Datatables\Datatables;


class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followerrs', 'follows_id', 'user_id')
            ->withTimestamps();
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
            ->withTimestamps();
    }

    public function follow($userId)
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId)
    {
        return (boolean) $this->follows()->where('nickname', $userId)->first();
    }
    
    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function getRouteKeyName()
    {
        return 'nickname';
    }


    public static function getUsersData(Datatables $datatables) 
    {
        return $datatables->eloquent(User::query())
                          ->editColumn('name', function ($user) {
                              return '<a>' . $user->name . '</a>';
                          })
                          ->addColumn('action', 'eloquent.tables.users-action')
                          ->rawColumns(['name', 'action'])
                          ->make(true);
    }
}
