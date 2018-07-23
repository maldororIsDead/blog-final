<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateBlogPost;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate();

        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(StoreBlogPost $request)
    {
        $post = Post::create($request->all());

        $post->addMediaFromRequest('thumbnail')->toMediaCollection('images');

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    public function update(UpdateBlogPost $request, Post $post)
    {
        $post->update($request->all());

        if (isset($request->thumbnail)) {
            $post->clearMediaCollection('images');
            $post->addMediaFromRequest('thumbnail')->toMediaCollection('images');
        }

        return redirect()->route('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
