@extends('layouts.app')

@section('title', '| Show')

@section('content')
		<div class="row">
			<div class="col-md-8">
				<h1>{{$post->title}}</h1>

				<p class="lead">{{$post->body}}</p>
			</div>

			<div class="col-md-4">
				<div class="well">
						<p>
							<label>Url:</label>
							<a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a>
						</p>
		
						<p>
							<label>Created At:</label>
							{{ date('M j, Y h:ia', strtotime($post->created_at)) }}
						</p>
	
						<p>
							<label>Last Updated:</label>
							{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}
						</p>
				

					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>

						<div class="col-sm-6">
							{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
							{!! Form::close() !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{{ Html::linkroute('dashboard', '<< See All Post', [], ['class' => 'btn btn-default btn-block btn-h1-spacing'])}}
						</div>
						
					</div>
				</div>
			</div>
		</div>
		

@endsection