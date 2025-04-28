<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class post extends Model
{
    //
    function comments(){
        return $this->hasMany(Comment::class);
    }
}
