<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'categories'];

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function addComment($name, $email, $body)
    {
        $this->comments()->create(compact('name', 'email', 'body'));
        // Comment::create([
        //     'name' => $name,
        //     'post_id' => $this->id,
        //     'email' => $email,
        //     'body' => $body,
        // ]);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
