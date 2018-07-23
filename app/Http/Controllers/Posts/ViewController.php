<?php

namespace App\Http\Controllers\Posts;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


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
