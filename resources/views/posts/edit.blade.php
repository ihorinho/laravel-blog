@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
{!! Form::model($post, ["route" => ["posts.update", $post->id], "method" => "PUT", "id" => "update-post-form", "data-parsley-validate" => ""]) !!}
<div class="row">
    <div class="col-md-8">
        {{ Form::label("title", "Title:") }}
        {{ Form::text("title", null, ["class" => "form-control input-lg", "required" => "", "maxlength" => "255"]) }}
        {{ Form::label("body", "Body:", ["class" => "input-top-spacing"]) }}
        {{ Form::textarea("body", null, ["class" => "form-control", "required" => ""]) }}
    </div>
    <div class="col-md-4">
        <div class="card border-secondary">
            <div class="card-body">
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
                        {!! Html::linkRoute("posts.show", "Cancel", ["id" => $post->id], ["class" => "btn btn-danger btn-block"]) !!}
                    </div>
                    <div class="col-md-6">
                        {{ Form::submit("Save", ["id" => "delete-post-form", "class" => "btn btn-success btn-block"]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}   
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection