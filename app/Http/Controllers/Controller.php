<?php

namespace App\Http\Controllers;
use illuminate\Http\Request;
use App\Models\post;

abstract class Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
}
