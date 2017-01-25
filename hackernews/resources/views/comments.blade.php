@extends('layouts.app')
@section('content')

    @if(session('delete'))
        <div class="bg-danger clearfix">
            Are you sure you want to delete this comment?

            <form action="{{ url('/comments/delete') }}" method="POST" class="pull-right">
                {{ csrf_field() }}

                <input type="hidden" name="from" value="overview">
                <input type="hidden" name="comment_id" value="{{ session('comment_id') }}">
                <input type="hidden" name="post_id" value="{{ App\Comment::find(session('comment_id'))->post_id }}">

                <button name="delete" class="btn btn-danger" value="{{ session('comment_id') }}">
                    <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
                </button>

                <button name="cancel" class="btn btn-default" value="{{ session('comment_id')}}">
                    <i class="fa fa-btn fa-ban" title="cancel"></i> cancel
                </button>

            </form>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            Article: {{ $post->title }}
        </div>

        <div class="panel-content">

            <?php $where = ['user_id' => Auth::id(), 'post_id'=> $post->id];
            $vote = App\Vote::where($where)->first();
            ?>

                <div class="vote">
                    @if(Auth::guest())
                        <div class="vote">
                            <div class="form-inline upvote">
                                <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to upvote"></i>
                            </div>
                            <div class="form-inline upvote">
                                <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>
                            </div>
                        </div>
                    @elseif(Auth::id() == $post->user_id)
                        <div class="vote">
                            <div class="form-inline upvote">
                                <i class="fa fa-btn fa-caret-up disabled upvote" title="You can't vote on your own posts"></i>
                            </div>
                            <div class="form-inline upvote">
                                <i class="fa fa-btn fa-caret-down disabled downvote" title="You can't vote on your own posts"></i>
                            </div>
                        </div>
                    @elseif(!isset($vote->value))
                        <form action="{{ url('/vote/up') }}" method="POST"
                              class="form-inline upvote">
                            {{ csrf_field() }}
                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                            </button>

                        </form>
                        <form action="{{ url('/vote/down') }}" method="POST"
                              class="form-inline downvote">
                            {{ csrf_field() }}

                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                            </button>

                        </form>
                    @elseif($vote->value == 0)
                        <form action="{{ url('/vote/up') }}" method="POST"
                              class="form-inline upvote">
                            {{ csrf_field() }}
                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                            </button>

                        </form>
                        <form action="{{ url('/vote/down') }}" method="POST"
                              class="form-inline downvote">
                            {{ csrf_field() }}

                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                            </button>

                        </form>
                    @elseif($vote->value == 1)
                        <form action="{{ url('/vote/cancel') }}" method="POST"
                              class="form-inline upvote">
                            {{ csrf_field() }}
                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-up voted" title="cancel"></i>
                            </button>

                        </form>
                        <form action="{{ url('/vote/down') }}" method="POST"
                              class="form-inline downvote">
                            {{ csrf_field() }}

                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                            </button>

                        </form>
                    @elseif($vote->value == -1)
                        <form action="{{ url('/vote/up') }}" method="POST"
                              class="form-inline upvote">
                            {{ csrf_field() }}
                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                            </button>

                        </form>
                        <form action="{{ url('/vote/cancel') }}" method="POST"
                              class="form-inline downvote">
                            {{ csrf_field() }}

                            <button name="post_id" value="{{ $post->id }}">
                                <i class="fa fa-btn fa-caret-down voted" title="cancel"></i>
                            </button>

                        </form>
                    @endif
                </div>

            <div class="url">
                <a href="{{ $post->link }}"
                   class="urlTitle">{{ $post->title }}</a>
            </div>
            <div class="info">
                {{ $post->vote_count() }} {{ str_plural('point', $post->vote_count()) }} | posted
                by {{ App\User::find($post->user_id)->name }}
                | {{ count(App\Post::find($post->id)->comments) }} {{ str_plural('comment', count(App\Post::find($post->id)->comments)) }}
            </div>

            <div class="comments">

                <ul>
                    @foreach($comments as $comment)
                        <li>
                            <div class="comment-body">{{ $comment->text }}</div>
                            <div class="comment-info">
                                Posted by {{ App\User::find($comment->user_id)->name }} on {{ $comment->created_at }}
                                @if(App\User::find($comment->user_id) == Auth::user())

                                    <a href="{{ url('comments/edit', $comment->id) }}"
                                       class="btn btn-primary btn-xs edit-btn">edit</a>
                                    <a href="{{ url('comments/delete', $comment->id) }}"
                                       class="btn btn-danger btn-xs edit-btn">
                                        <i class="fa fa-btn fa-trash" title="delete"></i> delete
                                    </a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            @if(Auth::check())
                <form action="{{ url('/comments/add') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Comment data -->
                    <div class="form-group">
                        <label for="body" class="col-sm-3 control-label">Comment</label>

                        <div class="col-sm-6">
                            <textarea type="text" name="body" id="body" class="form-control"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <!-- Add comment -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add comment
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>


    </div>
@endsection