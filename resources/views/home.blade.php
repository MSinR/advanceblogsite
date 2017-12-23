@extends('layouts.app')

@section('title', '| Your Post')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1>Welcome to DipCiti</h1>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
            </div>
        </div>
    </div>

    <div class="row">
        
            <div class="col-md-8">
                <h2>Trending Posts</h2>
                @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    <p class="blog-post-meta">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                    <p>{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? '...' : ""}}<a href="{{ route('blog.single', $post->slug) }}"> Read More</a></p> 
                    <hr>
                </div><!-- /.blog-post -->
                @endforeach
            </div>
        
        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>
@endsection