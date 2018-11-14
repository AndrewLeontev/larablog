<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['name', 'body', 'post_id', 'email'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
