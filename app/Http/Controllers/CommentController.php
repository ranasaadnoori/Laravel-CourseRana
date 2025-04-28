<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\post;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    //
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required'
        ]);

        Comment::create([
            'post_id' => $postId,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $postId)->with('success', 'Comment added.');
    }

   



    public function edit(Request $request , $id)
    {
    $comment = Comment::findOrFail($id);
    return view('comments.edit', compact('comment'));
    }


    public function update(Request $request , $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->body = $request->body;
        $comment->save();
        return redirect()->route('posts.show',$comment->post_id);
        
        
    }

    public function destroy($id)
    {
        
        $comment = Comment::findOrFail($id);
   
        $comment->delete();


        return redirect()->route('posts.show', $comment->post_id)->with('success', 'edit ok.');

        
    }


   


}
