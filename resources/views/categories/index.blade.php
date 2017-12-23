@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of col-md-8 -->

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
					<h2>New Category</h2>
					<div class="form-group">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
						{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		</div><!-- end of col-md-3 -->
	</div>
@endsection