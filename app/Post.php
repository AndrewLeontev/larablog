<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'category_id', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function addComment($user_id, $name, $email, $body)
    {
        $this->comments()->create(compact('user_id', 'name', 'email', 'body'));
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {

        if (isset($filters['month'])) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }
        if (isset($filters['year'])) {
            $query->whereYear('created_at', $filters['year']);
        }

    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->latest()
            ->groupBy('year', 'month')
            ->get()
            ->toArray();
    }

    public static function latestPosts()
    {
        return static::latest()->take(3)->get();
    }
}
