@extends('layouts.admin-master')

@section('styles')
	<link rel="stylesheet" href="{{ asset('src/css/model.css') }}">
@endsection

@section('content')
	@include('includes.infoBox')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
					<a href="#" class="btn btn-success btn-sm" id="add">new Post</a>
					<a href="{{ route('posts.show') }}" class="btn btn-info btn-sm">Show All Post</a>
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
					@endif
			  	</div>
			  	<div class="panel-footer">
					Total Posts: {{ count($postsCount) }}
			  	</div>
			</div>
	  	</div>

		<div class="col-md-6">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
					<a href="#" class="btn btn-info btn-sm">Show All messages</a>
			  	</div>
			  	<div class="panel-body">
					{{-- if no messages  --}}
					<div class="alert alert-info">no messages</div>
					{{-- if messages  --}}
					<article class="messages">
						<p class="message-info">
							<h3 class="message-subtitle">messages subject</h3>
							<span class="info">Sender... | Date</span>
						</p>
						<div class="edit">
							<ul>
								<li><a href="#">view messages | </a></li>
								<li><a href="#" class="delete">delete messages</a></li>
							</ul>
						</div>
					</article>
			  	</div>
			  	<div class="panel-footer">
					Total messages: ....
			  	</div>
			</div>
	  	</div>
	</div>
	{{-- start view show massege model --}}
	<div class="modal fade" id="message-modal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        <p>One fine body&hellip;</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


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
					   {{-- Start category --}}
                        	<div class="form-group row">
                        		<label class="col-sm-2 col-form-label" for="category">category</label>
                        		<div class="col-sm-10">
                        			<select class="form-control" id="category" name="category">
								<option>Dummy category</option>
							</select>
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
