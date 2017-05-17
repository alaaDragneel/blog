@extends('layouts.admin-master')

@section('content')
	@include('includes.infoBox')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
					<a href="{{ route('edit.post', ['post_id' => $post->id]) }}" class="btn btn-info btn-sm">Edit Post</a>
					<a href="{{ route('delete.post', ['post_id' => $post->id]) }}" class="btn btn-danger btn-sm">delete Post</a>
			  	</div>
			  	<div class="panel-body">
					<article class="posts">
						<h3 class="post-title">{{ $post->title }}</h3>
						<span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
						<p class="post-info">
							{{ $post->body }}
						</p>
					</article>
			  	</div>
			</div>
	  	</div>
	</div>

@endsection
