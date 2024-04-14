<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(CommentRequest $request, $id)
    {
        // finding the post
        $post = Post::findOrFail($id);
     
        $comment = $request->only('comment');
        $comment['user_id'] = auth()->user()->id;

        // assigning the request data to the comment relationship 
        $comment = $post->comments()->create($comment);
        session()->flash('msg', 'Comment posted successfully!');
        return back();
    }

    public function update(CommentRequest $request, $id)
    {
        // finding the post
        dd($request->all());
        $post = Post::findOrFail($id);
     
        $comment = $request->only('comment');
        $comment['user_id'] = auth()->user()->id;

        // assigning the request data to the comment relationship 
        $comment = $post->comments()->update($comment);
        session()->flash('msg', 'Comment updated successfully!');
        return back();
    }
    
    public function destroy(Post $post,$comment_id)
    {
        $comment = $post->comments()->findOrFail($comment_id);
        $comment->delete();
        session()->flash('msg', 'Comment deleted successfully!');
        return back();
    }
    
}
