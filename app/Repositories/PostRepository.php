<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function getUndeletedPosts()
    {
        return Post::where(function ($query) {
            $query->where('status', 0)
                ->orWhere('status', 1);
        })->get();
    }
}