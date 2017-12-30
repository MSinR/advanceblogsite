@extends('layouts.app')

@section('title', '| $post->title')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if($post->image)
			<img src="{{ asset('images/' . $post->image) }}" style="width:100%;">
			@endif
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<small>Posted in: {{ $post->category->name }}</small>
		</div>
	</div><br>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comment-count"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comment(s)</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">
						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=robohash" }}" class="author-img">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="comment-time">{{ date('F nS, Y - g:i a', strtotime($comment->created_at)) }}</p>
						</div>
						
					</div>
					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>
			@endforeach
		</div>
	</div><br>

	<div class="row"">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
		{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('name', "Name:")}}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('email', "Email:") }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{{ Form::label('comment', "Comment:") }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3'])}}
				</div>
				{{ Form::submit('Add Comment', ['class' => 'form-control btn btn-success'])}}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection