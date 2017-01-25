<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Post;
use App\Comment;
use App\User;
use App\Vote;
Use Illuminate\Http\Request;

Route::get('/logout', 'Auth\LogoutController@logout');

/*************
 *   POSTS   *
 *************/

Route::get('/home', 'PostController@index');
Route::get( '/',                     'PostController@index');
Route::any( '/post/add',            'PostController@add');
Route::get( '/post/edit/{id}',     'PostController@editPage');
Route::post('/post/edit',           'PostController@edit');
Route::get( '/post/delete/{id}',   'PostController@deletePage');
Route::post('/post/delete',         'PostController@delete');

/****************
 *   COMMENTS   *
 ****************/

Route::get( '/comments/{id}',           'CommentController@showComments');
Route::post('/comments/add',            'CommentController@add');
Route::get( '/comments/edit/{id}',     'CommentController@editPage');
Route::post('/comments/edit',           'CommentController@edit');
Route::get( '/comments/delete/{id}',   'CommentController@deletePage');
Route::post('/comments/delete',         'CommentController@delete');

/*************
 *   VOTES   *
 *************/

Route::post('/vote/up',     'VoteController@upvote');
Route::post('/vote/down',   'VoteController@downvote');
Route::post('/vote/cancel', 'VoteController@cancel');

Auth::routes();


