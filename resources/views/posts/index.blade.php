@extends('layouts.app')

@section('content')
    <div class="container px-5">
        <div class="row justify-content-center">
            @foreach ($posts as $post)
                <div class="col-8 mb-3 mx-5">
                    <div class="card">
                        <div class="card-header py-4">
                            <h3><a href="{{ route('posts.show', $post->id)}}">{{ $post->title }}</a></h3>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}">
                            <img class="card-img-top" src="#" alt="Card image cap"></a>
                        <div class="card-body">
                            <p class="card-text py-2">{{ $post->summary }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <i class="fa fa-thumbs-o-up" style="font-size: 1.5rem" aria-hidden="true"> 0</i>
                            <i class="fa fa-eye" style="font-size: 1.5rem" aria-hidden="true"> 0</i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection