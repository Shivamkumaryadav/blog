<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  auth()->user();

        if ($user && $user->email == "shivamyadav4046@gmail.com") {
            $user_id = $user->id;
            $posts = Post::where('user_id', $user_id)
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(4);
        }
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
        }

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'excerpt' => $request->input('excerpt'),
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category'),
            'image' =>  $name,
        ]);

        // Flash message and redirect
        session()->flash('msg', 'Post created successfully!');
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // not found any post 
        if (!$post) {
            abort(404);
        }
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {

        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
        }

        // finding the corresponding post
        $post = Post::whereId($id)->first();

        $post->update([
            'title' => request()->input('title'),
            'excerpt' => request()->input('excerpt'),
            'description' => request()->input('description'),
            'category_id' => request()->input('category'),
            'image' => $name ?? $post->image,
        ]);
        session()->flash('msg', 'Post updated successfully!');
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Get the file
        $filePath = public_path('images/' . $post->image);

        // Check if the file exists  to delete it
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $post->delete();
        session()->flash('msg', 'Post deleted successfully!');


        return redirect('/admin/posts');
    }
}
