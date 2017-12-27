@extends('layouts.app')

@section('title', "| Edit Comment")

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		

	<h1>Edit Comment</h1>
	{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
		<div class="form-group">
			{{ Form::label('name') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}
		</div>

		<div class="form-group">
			{{ Form::label('email') }}
			{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}
		</div>

		<div class="form-group">
			{{ Form::label('comment') }}
			{{ Form::textarea('comment', null, ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Update Comment', ['class' => 'btn btn-success btn-block']) }}

	{{ Form::close() }}

		</div>
</div>
@endsection
