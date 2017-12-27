@extends('layouts.app')

@section('title', '| Create New Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
    	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    	<div class="form-group">
    		{{Form::label('title', 'Title')}}
    		{{Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}
    	</div>
        <div class="form-group">
            {{ Form::label('category_id', 'Category') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('tags', 'Tags') }}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
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

@section('script')
    {!! Html::script('js/select2.min.js') !!}


    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection