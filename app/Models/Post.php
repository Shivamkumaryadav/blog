<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user', 'category'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // filtering the post based on search and category
    public function scopeFilter($query, $filter)
    {
        $this->loadOnly($query, $filter);
    }

    public function loadOnly($query, $filter)
    {
        if ($filter == 'search' ) {
            return $query->where(function ($query) use ($filter) {
                $query->where('title', 'like', "%" . request('search') . "%");
                    // ->orWhere('description', 'like', "%" . request('search') . "%");
            });
        } elseif ($filter == 'category') {
            return $query->whereHas('category', function ($query) use ($filter) {
                $query->where('category', 'like', "%" . request('category') . "%");
            });
        } else {
            // No specific filter, load all posts
            return $query->paginate(5);
        }
    }

}
