<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class post extends Model
{
    //
    protected $fillable = ['title', 'content'];
    function comments(){
        return $this->hasMany(Comment::class);
    }
}
