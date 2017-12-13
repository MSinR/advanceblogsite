@extends('layout.app')

@section('title', '| Create New Post')

@section('content')
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Create Post</h1>
    	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    	<div class="form-group">
    		{{Form::label('title', 'Title')}}
    		{{Form::text('title', '', ['class' => 'form-control'])}}
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