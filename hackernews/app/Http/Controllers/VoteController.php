<?php

namespace App\Http\Controllers;
use Closure;

use Illuminate\Http\Request;
use App\Post;
use App\Vote;
use Auth;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware(function ($request, Closure $next) {

            $post = Post::findOrFail($request->post_id);

            if (Auth::id() == $post->user_id) {
                return redirect(url('/'))->with('failure', 'You cannot vote on your own posts.');

            } else {
                return $next($request);

            }
        });
    }

    public function upvote(Request $request)
    {
        $post = Post::findOrFail($request->post_id);

        $where = ['user_id' => Auth::id(), 'post_id' => $request->post_id];
        $vote = Vote::where($where)->first();

        if (isset($vote)) {
            switch ($vote->value) {
                case 0:
                    $vote->value += 1;
                    $vote->save();
                    return redirect(url('/'))->with('success', sprintf('You have upvoted \'%s\'', $post->title));
                    break;
                case -1:
                    $vote->value += 2;
                    $vote->save();
                    return redirect(url('/'))->with('success', sprintf('You have upvoted \'%s\'', $post->title));
                    break;
                case 1:
                    return redirect(url('/'))->with('failure', sprintf('You already upvoted \'%s\'', $post->title));
            }
        } else {
            $vote = new Vote;
            $vote->value = 1;
            $vote->user_id = Auth::id();
            $vote->post_id = $request->post_id;
            $vote->save();

            return redirect(url('/'));
        }
    }

    public function downvote(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $where = ['user_id' => Auth::id(), 'post_id' => $request->post_id];
        $vote = Vote::where($where)->first();

        if (isset($vote)) {
            switch ($vote->value) {
                case 0:
                    $vote->value -= 1;
                    $vote->save();
                    return redirect(url('/'))->with('success', sprintf('You have downvoted \'%s\'', $post->title));
                    break;
                case 1:
                    $vote->value -= 2;
                    $vote->save();
                    return redirect(url('/'))->with('success', sprintf('You have downvoted \'%s\'', $post->title));
                    break;
                case 1:
                    return redirect(url('/'))->with('failure', sprintf('You already downvoted \'%s\'', $post->title));
            }
        } else {
            $vote = new Vote;
            $vote->value = -1;
            $vote->user_id = Auth::id();
            $vote->post_id = $request->post_id;
            $vote->save();

            return redirect(url('/'));
        }
    }

    public function cancel(Request $request)
    {
        $post = Post::findOrFail($request->post_id);

        $where = ['user_id' => Auth::id(), 'post_id' => $request->post_id];
        $vote = Vote::where($where)->first();

        if (isset($vote)) {
            $vote->value = 0;
            $vote->save();

            return redirect(url('/'))->with('success', sprintf('You have canceled your vote for \'%s\'', $post->title));
        } else {
            return redirect(url('/'))->with('warning', sprint('You didn\'t vote on \'%s\' yet.', $post->title));
        }
    }
}
