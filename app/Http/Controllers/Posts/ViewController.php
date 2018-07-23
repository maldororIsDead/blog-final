<?php

namespace App\Http\Controllers\Posts;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function store(Post $post, Request $request): JsonResponse
    {
        $post->viewPost($request->ip());

        return response()->json([
            'views_count' => $post->fresh()->views()->count()
        ]);
    }
}
