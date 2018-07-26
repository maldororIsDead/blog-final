<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateBlogPost;
use App\Http\Resources\PostResource;


class PostController extends Controller
{

    public function index()
    {
        return PostResource::collection(Post::paginate());
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(StoreBlogPost $request)
    {
        $post = Post::create($request->all());

        $post->addMediaFromRequest('thumbnail')->toMediaCollection('images');

        return new PostResource($post);
    }

    public function update(UpdateBlogPost $request, Post $post)
    {
        $post->update($request->all());

        if (isset($request->thumbnail)) {
            $post->clearMediaCollection('images');
            $post->addMediaFromRequest('thumbnail')->toMediaCollection('images');
        }

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return PostResource::collection(Post::all());
    }
}
