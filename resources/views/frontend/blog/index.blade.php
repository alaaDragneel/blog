@extends('layouts.master')

@section('title')
	Blog | Home
@endsection

@section('content')
	@include('includes.infoBox')
	@foreach ($posts as $post)
		<article class="blog-post">
			<h3>{{ $post->title }}</h3>
			<span class="subtitle">{{ $post->author }} | {{ $post->created_at }}</span>
			<p>{{ $post->body }}</p>
			<a href="{{ route('blog.single', ['post_id' => $post->id]) }}">read more</a>
		</article>
	@endforeach
       	@if ($posts->lastPage() > 1)
			<div class="pagination col-lg-12">
       			@if ($posts->currentPage() !== 1)
       				<a href="{{ $posts->previousPageUrl() }}"><i class="fa fa-caret-left"></i></a>
       			@endif
				@if ($posts->currentPage() !== $posts->lastPage())
       				<a href="{{ $posts->nextPageUrl() }}"><i class="fa fa-caret-right"></i></a>
       			@endif
			</div>
       	@endif
@endsection
