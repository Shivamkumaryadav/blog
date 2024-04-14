<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        //filtering the data coming from search or category based
        $filter = $request->has('search') ? 'search' : ($request->has('category') ? 'category' : null);
        
        $posts = Post::filter($filter)->paginate(5);
       $categories = Category::all();
        $recentPosts = Post::orderBy('created_at','desc')->take(6)->get();
        $recentComments = Comment::orderBy('created_at','desc')->take(3)->get();
        return view('posts.index', compact('posts','recentPosts', 'recentComments', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $post = Post::with('comments')->findOrFail($id);
        $comments = $post->comments->load('user');
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
