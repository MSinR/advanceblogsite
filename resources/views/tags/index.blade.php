@extends('layouts.app')

@section('title', 'All Tags')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
				</thead>
				<tbody>
					@foreach($tags as $tag)
					<tr>
						<td>{{$tag->id}}</td>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of col-md-8 -->

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
					<h2>New Tags</h2>
					<div class="form-group">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
						{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		</div><!-- end of col-md-3 -->
	</div>
@endsection