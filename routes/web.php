<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('email/verify', 'Auth\VerificationController@verify')
    ->middleware('signed')
    ->name('email.verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function()
{
    Route::resource('posts', 'Admin\PostController');
});

Route::resource('posts', 'Posts\PostController')->only([
    'index', 'show'
]);


Route::post('posts/{post}/like', 'Posts\LikeController@store')
    ->middleware('auth')
    ->name('posts.like');


Route::post('posts/{post}/views', 'Posts\ViewController@store')
    ->middleware('auth')
    ->name('posts.view');