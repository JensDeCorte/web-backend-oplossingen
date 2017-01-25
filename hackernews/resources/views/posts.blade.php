@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Article overview</div>

        <div class="panel-content">

            <ul class="article-overview">
                @foreach ($posts as $post_id => $votes)
                    <?php $post = App\Post::findOrFail($post_id) ;?>
                    <?php $where = ['user_id' => Auth::id(), 'post_id'=> $post->id];
                            $vote = App\Vote::where($where)->first();
                    ?>
                    <li>
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
                            @if(App\User::find($post->user_id) == Auth::user())
                                <a href="{{ url('/post/edit', $post->id) }}" class="btn btn-primary btn-xs edit-btn">edit</a>
                            @endif
                        </div>
                        <div class="info">
                            {{ $post->vote_count() }} {{ str_plural('point', $post->vote_count()) }} | posted
                            by {{ App\User::find($post->user_id)->name }} | <a
                                    href="{{ url('/comments' , $post->id) }}">{{ count(App\Post::find($post->id)->comments) }} {{ str_plural('comment', count(App\Post::find($post->id)->comments)) }}</a>
                        </div>
                    </li>
                @endforeach

            </ul>

        </div>

    </div>
@endsection