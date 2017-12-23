@extends('layouts.app')

@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Contact</h1>
    	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    	<div class="form-group">
    		{{Form::label('email', 'Email')}}
    		{{Form::email('email', '', ['class' => 'form-control'])}}
    	</div>
    	<div class="form-group">
    		{{Form::label('subject', 'Subject')}}
    		{{Form::text('subject', '', ['class' => 'form-control'])}}
    	</div>
    	<div class="form-group">
    		{{Form::label('message', 'Message')}}
    		{{Form::textarea('message', '', ['class' => 'form-control'])}}
    	</div>
    	{{Form::submit('Send Message', ['class' => 'btn btn-success'])}}
		{!! Form::close() !!}
        </div>
    </div>
@endsection