<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = post::paginate(2);
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

    public function apiIndex()
    {
        // $posts = Post::with("comments")->latest()->get();
        $post =Post::select('id','title','content')->with(['comments:id,post_id,body'])->latest()->get();

        // Eloquent Examples to Try:

        // 11. Use simplePaginate for API performance
        // $posts = Post::latest()->simplePaginate(10);

        return response()->json(['post' => $post]);
    }

    public function apiShow($id)
    {
        $post = Post::with('comments')->findOrFail($id);

        // Eloquent Examples to Try:

        // 12. Using select for lighter API responses
        // $post = Post::select('id', 'title')->with('comments')->findOrFail($id);

        return response()->json(['post' => $post]);
    }

    public function apiStore(Request $request)
    {
        $validatedData = $this->validatePost($request);

        $post = Post::create($validatedData);

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $validatedData = $this->validatePost($request);

        $post = Post::findOrFail($id);
        $post->update($validatedData);

        return response()->json(['message' => 'Post updated successfully', 'post' => $post]);
    }

    public function apiDestroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    protected function validatePost(Request $request)
    {
        return $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    }


   
}
