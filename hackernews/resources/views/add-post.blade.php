@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Add article</div>

        <div class="panel-content">

            <form action="http://localhost/hackernews/public/post/add" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Article data -->
                <div class="form-group">
                    <label for="article-title" class="col-sm-3 control-label">Title (max. 255 characters)</label>

                    <div class="col-sm-6">
                        <input type="text" name="title" id="article-title" class="form-control">
                    </div>
                </div>


                <!-- Article url -->
                <div class="form-group">
                    <label for="article-url" class="col-sm-3 control-label">URL</label>

                    <div class="col-sm-6">
                        <input type="text" name="url" id="article-url" class="form-control">
                    </div>
                </div>


                <!-- Add Article Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Article
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection