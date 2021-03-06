@extends('layouts.app')

@section('title', '| Blog')

@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<h1>Blog</h1>
		</div>
	</div>

	
	<div class="row">
		@foreach($posts as $post)
		<div class="col-md-8 col-md-offset-2">
			<h2>{{ $post->title }}</h2>
			<small>Published: {{ date('M j, Y', strtotime($post->created_at))}} by: {{ $post->user->name }} Category: {{ $post->category->name }}</small>

			<p>{{ substr(strip_tags($post->body), 0, 250) }} {{ strlen(strip_tags($post->body)) > 250 ? '...' : ""}} </p>

			<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-default btn-sm">Read More</a>
			<hr>
		</div>
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			{!! $posts->links() !!}
		</div>
	</div>
@endsection