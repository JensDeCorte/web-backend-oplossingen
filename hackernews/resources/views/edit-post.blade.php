@extends('layouts.app')

@section('content')

    @if(isset($delete))
    <div class="bg-danger clearfix">
        Are you sure you want to delete this post?

        <form action="{{ url('/post/delete') }}" method="POST" class="pull-right">
            {{ csrf_field() }}

            <button name="delete" class="btn btn-danger" value="{{ $post->id }}">
                <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
            </button>

            <button name="cancel" class="btn btn-default" value="{{ $post->id }}">
                <i class="fa fa-btn fa-ban" title="cancel"></i> cancel
            </button>

        </form>
    </div>
    @endif
    <div class="panel panel-default">

        <div class="panel-heading clearfix">Edit post
            <a href="{{ url('/post/delete', $post->id) }}" class="btn btn-danger btn-xs pull-right">
                <i class="fa fa-btn fa-trash" title="delete"></i> delete post
            </a>
        </div>

        <div class="panel-content">

            <form action="{{ url('/post/edit') }}" method="POST" class="form-horizontal">
            {{csrf_field()}}


                <div class="form-group">
                    <label for="article-title" class="col-sm-3 control-label">Title (max. 255 characters)</label>

                    <div class="col-sm-6">
                        <input type="text" name="title" id="article-title" class="form-control"
                               value="{{ $post->title }}">
                    </div>
                </div>


                <div class="form-group">
                    <label for="article-url" class="col-sm-3 control-label">URL</label>

                    <div class="col-sm-6">
                        <input type="text" name="url" id="article-url" class="form-control"
                               value="{{ $post->link }}">
                    </div>
                </div>

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-pencil-square-o"></i> Edit Post
                        </button>
                    </div>
                </div>
            </form>

        </div>


    </div>
@endsection