<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        \App\Models\User::factory()->create([
            'name' => 'Shivam',
            'email' => 'shivamyadav4046@gmail.com',
            'password' => '00000000'
        ]);

        Category::factory(3)->create();
        Post::factory(10)->create();
        Comment::factory(10)->create();
        Reply::factory(10)->create();
    }
}
