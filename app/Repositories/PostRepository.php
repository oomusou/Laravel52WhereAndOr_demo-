<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function getUndeletedPosts()
    {
        return Post::whereRaw('status = 0 or status = 1')
            ->get();
    }
}