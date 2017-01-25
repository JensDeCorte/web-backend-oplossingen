<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Closure;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('showComments');

        $this->middleware(function ($request, Closure $next) {
            if (isset($request->id)) {
                $comment = Comment::findOrFail($request->id);
            } elseif (isset($request->comment_id)) {
                $comment = Comment::findOrFail($request->comment_id);
            } elseif (isset($request->cancel)) {
                $comment = Comment::findOrFail($request->cancel);
            } elseif (isset($request->delete)) {
                $comment = Comment::findOrFail($request->delete);
            }

            if (Auth::id() == $comment->user_id) {
                return $next($request);
            } else {
                return redirect(url('/'))->with('failure', 'You can only modify your own comments.');
            }

        })->except('showComments', 'add');
    }

    public function showComments($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;

        return view('comments', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'body' => 'required',
            'post_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->text = $request->body;
        $comment->save();

        return redirect(url('/comments', $request->post_id));
    }

    public function editPage($id){
        $comment = Comment::findOrFail($id);

        return view('edit-comment', [
            'comment' => $comment,
        ]);
    }

    public function edit(Request $request)
    {
        $comment = Comment::findOrFail($request->comment_id);
        $validator = Validator::make($request->all(), [
            'text' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(url('/comments/edit', $comment->id))
                ->withInput()
                ->withErrors($validator);
        }

        $comment->text = $request->text;

        try {
            $comment->save();

            return redirect(url('/'))->with('success', sprintf('Your comment \'%s\' was edited successfully', $request->title));
        } catch (Exception $e) {
            return redirect(url('/comments/edit', $request->comment_id))->with('failure', sprintf('Your comment \'%s\' could not be edited', $request->title));
        }

    }

    public function deletePage($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        $referer = $request->server('HTTP_REFERER');

        if ($referer == url('/comments', $comment->post_id)) {
            return redirect(url('/comments', $comment->post_id))->with('delete', 'delete')->with('comment_id', $id);
        } elseif ($referer == url('/comments/edit', $comment->id)) {
            return redirect(url('/comments/edit', $comment->id))->with('delete', 'delete');
        } else {
            return redirect(url('/'));
        }
    }

    public function delete(Request $request)
    {
        if (isset($request->cancel)) {
            $comment = Comment::findOrFail($request->cancel);

            if ($request->from == 'overview') {
                $comment = Comment::findOrFail($request->cancel);
                $post = Post::findOrFail($comment->post_id);
                return redirect(url('/comments', $post->id));
            } elseif ($request->from == 'edit') {
                return redirect(url('/comments/edit', $comment->id));
            }
        } elseif (isset($request->delete)) {
            $comment = Comment::findOrFail($request->delete);

            $post = Post::findOrFail($comment->post_id);
            $comment->delete();
            return redirect(url('/comments', $post->id))->with('success', 'Your comment was deleted succesfully');
        }
    }
}
