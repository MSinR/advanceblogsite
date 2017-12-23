@extends('layouts.app')

@section('title', '| $post->title')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->title }}</h1>
			<p>{{ $post->body }}</p>
			<small>Posted in: {{ $post->category->name }}</small>
		</div>
		
	</div>
@endsection