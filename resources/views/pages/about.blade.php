@extends('layout.app')

@section('title')
    Blogsite
@endsection

@section('content')
    <h1>About {{ $data['fullname'] }}</h1>
    <p>Email me at {{ $data['email'] }}</p>
@endsection
