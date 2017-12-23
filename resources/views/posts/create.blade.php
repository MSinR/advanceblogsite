@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
    	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    	<div class="form-group">
    		{{Form::label('title', 'Title')}}
    		{{Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}
    	</div>
    	<div class="form-group">
    		{{Form::label('body', 'Body')}}
    		{{Form::textarea('body', '', ['class' => 'form-control'])}}
    	</div>
    	{{Form::submit('Create Post', ['class' => 'btn btn-success btn-block'])}}
		{!! Form::close() !!}
        </div>
    </div>
@endsection