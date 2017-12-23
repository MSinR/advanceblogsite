@extends('layouts.app')

@section('title', '| Edit Blog Post')

@section('content')
        <div class="row">
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
            <div class="col-md-8">
                <div class="form-group" >
                    {{Form::label('title', 'Title')}}
                    {{ Form::text('title', null, ["class" => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'Slug') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}
                </div>
                 <div class="form-group">
                    {{ Form::label('category_id', 'Category:') }}
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{ Form::textarea('body', null, ['class' => 'form-control'])}}
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <p>
                        <label>Url:</label>
                        <a href="{{ url($post->slug) }}">{{url($post->slug)}}</a>
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
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>

                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
            </div>
        </div>
        {!! Form::close() !!}

@endsection