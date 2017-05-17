@extends('layouts.master')

@section('title')
	Blog | Contact
@endsection

@section('styles')
	<link rel="stylesheet" href="{{ asset('src/css/form.css') }}">
@endsection

@section('content')
	@include('includes.infoBox')
	<form action="{{route('contact.send')}}" method="post" id="contact-form">
		<div class="form-group">
		  	<label for="name">Your Name</label>
		  	<input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="{{ Request::old('name')}}">
		</div>
		<div class="form-group">
		  	<label for="email">Your email</label>
		  	<input type="email" class="form-control" id="email" name="email" placeholder="Your email" value="{{ Request::old('email')}}">
		</div>
		<div class="form-group">
		  	<label for="subject">Your subject</label>
		  	<input type="text" class="form-control" id="subject" name="subject" placeholder="Your subject" value="{{ Request::old('subject')}}">
		</div>
		<div class="form-group">
		  	<label for="message">Your message</label>
		  	<textarea class="form-control" id="message" name="message" rows="10" placeholder="Your message">{{ Request::old('message')}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Submit Message</button>
		{{ csrf_field() }}
	</form>
@endsection
