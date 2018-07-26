<?php

Route::get('/', 'Posts\PostController@index');

Auth::routes();

Route::get('email/verify', 'Auth\VerificationController@verify')
    ->middleware('signed')
    ->name('email.verify');

/*Route::group(['prefix' => 'admin'], function () {
    Route::get('posts', 'Admin\AdminController@index');
});*/

Route::get('admin/posts/', 'HomeController@index')->name('home');

Route::resource('posts', 'Posts\PostController')->only([
    'index', 'show'
]);

Route::post('posts/{post}/like', 'Posts\LikeController@store')
    ->middleware('auth')
    ->name('posts.like');

Route::post('posts/{post}/views', 'Posts\ViewController@store')
    ->name('posts.view');