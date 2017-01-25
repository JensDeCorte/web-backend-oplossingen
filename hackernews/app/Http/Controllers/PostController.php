<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Closure;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');

        $this->middleware(function ($request, Closure $next) {
            if (isset($request->id)) {
                $post = Post::findOrFail($request->id);
            } elseif (isset($request->post_id)) {
                $post = Post::findOrFail($request->post_id);
            } elseif (isset($request->cancel)) {
                $post = Post::findOrFail($request->cancel);
            } elseif (isset($request->delete)) {
                $post = Post::findOrFail($request->delete);
            }

            if (Auth::id() == $post->user_id) {
                return $next($request);
            } else {
                return redirect(url('/'))->with('failure', 'You can only modify your own posts.');
            }

        })->except('index', 'add');
    }

    public function index()
    {
        $posts = Post::all();
        $posts_votes = array();
        foreach ($posts as $post){
            $posts_votes[$post->id] = $post->vote_count();
        }

        arsort($posts_votes);
        return view('posts', [
            'posts' => $posts_votes,
        ]);
    }

    public function add(Request $request)
    {
        if (isset($request) and isset($request->title)) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'url' => 'required|url'
            ]);

            if ($validator->fails()) {
                return redirect(url('/post/add'))
                    ->withInput()
                    ->withErrors($validator);
            }

            $post = new Post;
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->link = $request->url;
            $post->save();

            return redirect('/')->with('success', sprintf('Your post \'%s\' was added successfully', $request->title));
        } else {
            return view('add-post');
        }
    }

    public function editPage($id)
    {
        $post = Post::findOrFail($id);
        return view('edit-post', [
            'post' => $post,
        ]);
    }

    public function edit(Request $request)
    {
        $post = Post::findOrFail($request->post_id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'url' => 'required|url'
        ]);

        if ($validator->fails()) {
            return redirect(url('/post/edit', $post->id))
                ->withInput()
                ->withErrors($validator);
        }

        $post->title = $request->title;
        $post->link = $request->url;
        try {
            $post->save();

            return redirect(url('/'))->with('success', sprintf('Your post \'%s\' was edited successfully', $request->title));
        } catch (Exception $e) {
            return redirect(url('/post/edit', $request->post_id))->with('failure', sprintf('Your post \'%s\' could not be edited', $request->title));
        }

    }

    public function deletePage($id)
    {
        $post = Post::findOrFail($id);

        return view('edit-post', [
            'post' => $post,
            'delete' => 'true'
        ]);
    }

    public function delete(Request $request)
    {
        if (isset($request->cancel)) {
            $post = Post::findOrFail($request->cancel);
            return view('edit-post', [
                'post' => $post,
            ]);

        } elseif (isset($request->delete)) {
            $post = Post::findOrFail($request->delete);
            $post->delete();
            return redirect(url('/'))->with('success', 'Your post was deleted succesfully');

        }
    }
}
