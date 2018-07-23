@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Create post</h3>
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id">
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle">Title</label>
                                    <input type="text" class="form-control" id="inputTitle" name="title"
                                           placeholder="Введите ваше имя">
                                </div>
                                @if ($errors->first('title'))
                                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="inputSummary">Summary</label>
                                    <textarea class="form-control" name="summary" id="inputSummary"
                                              rows="3"></textarea>
                                </div>
                                @if ($errors->first('summary'))
                                    <div class="alert alert-danger">{{ $errors->first('summary') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Body</label>
                                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1"
                                              rows="5"></textarea>
                                </div>
                                @if ($errors->first('body'))
                                    <div class="alert alert-danger">{{  $errors->first('body') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="inputFile">Загрузить файл</label>
                                    <input type="file" id="inputFile" name="thumbnail"/>
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