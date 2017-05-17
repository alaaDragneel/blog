@extends('layouts.admin-master')

@section('content')
	@include('includes.infoBox')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
					<a href="#" class="btn btn-success btn-sm" id="add">new Post</a>
			  	</div>
			  	<div class="panel-body">
					@if (count($posts) === 0)
						<div class="alert alert-info">no post</div>
					@else
						@foreach ($posts as $post)
							<article class="posts">
								<p class="post-info">
									<h3 class="post-title">{{ $post->title }}</h3>
									<span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
								</p>
								<div class="edit">
									<ul>
										<li><a href="{{ route('single.post', ['post_id' => $post->id, 'end' => 'admin']) }}">view post | </a></li>
										<li><a href="{{ route('edit.post', ['post_id' => $post->id]) }}">edit post | </a></li>
										<li><a href="{{ route('delete.post', ['post_id' => $post->id]) }}" class="delete">delete post</a></li>
									</ul>
								</div>
							</article>
						@endforeach
						@if ($posts->lastPage() > 1)
							<div class="row">
								<div class="pagination col-lg-12 text-center">
									{!! $posts->render() !!}
									{{-- @if ($posts->currentPage() !== 1)
										<a href="{{ $posts->previousPageUrl() }}"><i class="fa fa-caret-left fa-2x"></i></a>
									@endif
									@if ($posts->currentPage() !== $posts->lastPage())
										<a href="{{ $posts->nextPageUrl() }}"><i class="fa fa-caret-right fa-2x"></i></a>
									@endif --}}
								</div>
							</div>
						@endif
					@endif
			  	</div>
			  	<div class="panel-footer">
					Total Posts: {{ count($postsCount) }}

			  	</div>
			</div>
	  	</div>
	</div>
	<!-- Start Add Modal -->
	<div class="modal fade" id="Add-Modal" role="dialog" tabindex="-1">
	  <div class="modal-dialog" role="document">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>

				  <h4 class="modal-title">Add post</h4>
			  </div>

			  <div class="modal-body">
				 <form action="{{ route('add.post') }}" method="post">
					{{ csrf_field() }}
					{{-- Start Username --}}
				  <div class="form-group row">
					  <label class="col-sm-2 col-form-label" for="title">title</label>
					  <div class="col-sm-10">
						  <input type="text" class="form-control" id="title" name="title">
					  </div>
				  </div>
					{{-- End Username --}}
					{{-- Start Fullname --}}
				  <div class="form-group row">
					  <label class="col-sm-2 col-form-label" for="author">author</label>
					  <div class="col-sm-10">
						  <input type="text" class="form-control" id="author" name="author">
					  </div>
				  </div>
					{{-- End Fullname --}}
					{{-- Start Describtion --}}
				  <div class="form-group row">
					  <label class="col-sm-2 col-form-label" for="body">body</label>
					  <div class="col-sm-10">
						  <textarea type="text" class="form-control" id="body" name="body"></textarea>
					  </div>
				  </div>
					{{-- End Describtion --}}
					<div class="modal-footer">
					    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
					    <button class="btn btn-primary" type="submit" id="AddUser">Create Post</button>
					</div>
				 </form>
			  </div>


		  </div>
		  <!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<!-- End Add Modal -->
@endsection

@section('scripts')
	<script type="text/javascript">
		var token = "{{ Session::token() }}";
	</script>
    <script src="{{ asset('src/js/main.js') }}"></script>
@endsection
