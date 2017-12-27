@extends('layouts.app')

@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Contact Me</h1>

        <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label name="email">Email:</label>
                <input type="text" name="email" class="form-control">    
            </div>
            <div class="form-group">
                <label name="subject">Subject:</label>
                <input type="text" name="subject" class="form-control"> 
            </div>
            <div class="form-group">
                <label name="message">Message:</label>
                <textarea id="message" name="message" class="form-control"> 
                </textarea> 
            </div>
            <input type="submit" value="Send Message" class="btn btn-success">
        </form>
    </div>
@endsection