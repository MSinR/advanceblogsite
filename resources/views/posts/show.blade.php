@extends('layouts.app')

@section('title', '| Show')

@section('content')
		<div class="row">
			<div class="col-md-8">
				<h1>{{$post->title}}</h1>
				<p class="lead">{{$post->body}}</p>
				<hr>
				<div class="tags">
					<small>Tags:
						@foreach($post->tags as $tag)
							 <span class="label label-default">{{ $tag->name }}</span>
						@endforeach
					</small>
				</div>

				<div id="backend-comments">
					<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Comments</th>
								<th width="70px"></th>
							</tr>
						</thead>

						<tbody>
							@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					
				</div>
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

						<p>
							<label>Category:</label>
							{{ $post->category->name }}
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