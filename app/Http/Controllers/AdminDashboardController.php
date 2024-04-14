<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $posts = Post::count();
        $categories = Category::count();
        // dd($users);
        return view("dashboard", compact('users','posts','categories'));
    }
}
