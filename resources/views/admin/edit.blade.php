@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Edit post</h3>
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="post" action="{{ route('posts.update', $post->id) }}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle">Title</label>
                                    <input type="text" class="form-control" id="inputTitle" name="title"
                                           placeholder="Введите ваше имя" value="{{ $post->title }}">
                                </div>
                                @if ($errors->first('title'))
                                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="inputSummary">Summary</label>
                                    <textarea class="form-control" name="summary" id="inputSummary"
                                              rows="3">{{ $post->summary }}</textarea>
                                </div>
                                @if ($errors->first('summary'))
                                    <div class="alert alert-danger">{{ $errors->first('summary') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Body</label>
                                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1"
                                              rows="5">{{ $post->body }}</textarea>
                                </div>
                                @if ($errors->first('body'))
                                    <div class="alert alert-danger">{{ $errors->first('body') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="inputFile">Загрузить файл</label>
                                    <input type="file" id="inputFile" name="thumbnail_path"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection