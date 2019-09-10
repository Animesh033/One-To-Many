<?php

use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My first post with Edwin Diaz2', 'body'=>'I love Laravel, with Edwin Diaz']);
    // $user->posts()->save(new Post(['title'=>'My first post with Edwin Diaz', 'body'=>'I love Laravel, with Edwin Diaz']));
    $user->posts()->save($post);
});

Route::get('/read', function () {
    $user = User::findOrFail(1);
    // $post = Post::findOrFail(1);
    // dd($post->user);
    foreach ($user->posts as $post) {
        echo $post->title. "<br>";
    }
});

Route::get('/update', function () {
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->update(['title'=>'I love laravel', 'body'=>'This is awesome, thank you Edwin Diaz']);
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->delete();
    // $user->posts()->delete(); //to delete all post for user with id 1
});