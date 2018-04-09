@extends('main')

@section('title', '| Show Post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr />

            <div class="row">
                <div class="col-md-6">
                    {!! Html::linkRoute("posts.edit", "Edit", ["id" => $post->id], ["class" => "btn btn-primary btn-block"]) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::open(["route" => ["posts.destroy", $post->id], "id" => "delete-post-form","method" => "DELETE"]) !!}
                    {{ Form::submit("Delete", ["class" => "btn btn-danger btn-block"]) }}
                    {!! Form::close() !!}
                </div>
                <div class="col-md-12">
                    {!! Html::linkRoute("posts.index", "<<< Back to All Posts", [], ["class" => "btn btn-outline-dark input-top-spacing btn-block"]) !!}
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#delete-post-form").submit(function(e){
            return confirm('Do you really want to delete this post?');
        });
    </script>
@endsection
