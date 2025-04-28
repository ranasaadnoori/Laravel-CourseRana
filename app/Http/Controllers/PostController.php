<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = post::all();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index');
    }


    public function edit($id)
    {
    $post = Post::findOrFail($id);
    return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }


    public function show($id)
    {
        $post = Post::with('Comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }


   
}
