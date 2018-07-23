<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\JsonResponse;
use App\Post;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function store(Post $post): JsonResponse
    {
        $user = auth()->user();
        if ($post->isLikedBy($user)) {
            $user->unlike($post);
        } else {
            $user->like($post);
        }
        return response()->json([
            'likes_count' => $post->likes()->count(),
            'is_liked' => $post->isLikedBy($user)
        ]);
    }
}
