<?php

namespace App\Http\Controllers\Posts;

use App\Post;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
