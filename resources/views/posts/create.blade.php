@extends('main')

@section('title', '| Create Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store', 'id' => 'create-post-form', 'data-parsley-validate' => '']) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Post title', 'required' => '', 'maxlength' => '255' )) }}
            {{ Form::label('body', 'Post body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection