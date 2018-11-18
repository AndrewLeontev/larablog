<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'categories', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function addComment($user_id, $name, $email, $body)
    {
        $this->comments()->create(compact('user_id', 'name', 'email', 'body'));
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->latest()
            ->groupBy('year', 'month')
            ->get()
            ->toArray();
    }
}
