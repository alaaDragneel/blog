@extends('layouts.admin-master')

@section('styles')
	<link rel="stylesheet" href="{{ asset('src/css/model.css') }}">
@endsection

@section('content')
	@include('includes.infoBox')
<!-- Start Add Modal -->
<div id="edit-Modal" role="dialog">
  <div class="modal-dialog" role="document">
	  <div class="modal-content">
		  <div class="modal-header ">
			  <h4 class="modal-title">edit post</h4>
		  </div>

		  <div class="modal-body">
			 <form action="{{ route('update.post') }}" method="post">
			     {{ csrf_field() }}
				<input type="hidden" name="post_id" value="{{$post->id}}">
			     {{-- Start Username --}}
			  <div class="form-group row">
				  <label class="col-sm-2 col-form-label" for="title">title</label>
				  <div class="col-sm-10">
					  <input type="text" class="form-control" id="title" name="title" value="{{ Request::old('title') ? Request::old('title') : isset($post) ? $post->title : '' }}">
				  </div>
			  </div>
			     {{-- End Username --}}
			     {{-- Start Fullname --}}
			  <div class="form-group row">
				  <label class="col-sm-2 col-form-label" for="author">author</label>
				  <div class="col-sm-10">
					  <input type="text" class="form-control" id="author" name="author" value="{{ Request::old('author') ? Request::old('author') : isset($post) ? $post->author : '' }}">
				  </div>
			  </div>
			     {{-- End Fullname --}}
				{{-- Start category --}}
			  <div class="form-group row">
				  <label class="col-sm-2 col-form-label" for="category">category</label>
				  <div class="col-sm-10">
					  <div class="row">
					    <div class="col-md-8">
						    <select class="form-control" id="category" name="category">
							    @foreach ($categories as $cat)

								    <option value="{{$cat->id}}">{{$cat->name}}</option>
							    @endforeach
						    </select>
					    </div>
					    <div class="col-md-4">
						 <a href="#" class="btn btn-warning AddCAt" id="AddCat">Add category</a>
					    </div>
					  </div>
				  </div>
				  <div class="catName">
					  <ul>
						  @foreach ($post_categories as $postCat)
							  <li><a href="#" data-id="{{ $postCat->id }}">{{ $postCat->name }}</a></li>
						  @endforeach
					  </ul>
				  </div>
				  <input type="hidden" class="categories" id="categories" value="{{ implode(',', $post_categories_id) }}"/>
			  </div>
				{{-- End Fullname --}}
			     {{-- Start Describtion --}}
			  <div class="form-group row">
				  <label class="col-sm-2 col-form-label" for="body">body</label>
				  <div class="col-sm-10">
					  <textarea class="form-control" id="body" name="body">{{ Request::old('body') ? Request::old('body') : isset($post) ? $post->body : '' }}</textarea>
				  </div>
			  </div>
			     {{-- End Describtion --}}
			     <div class="modal-footer">
				    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
				    <button class="btn btn-primary" type="submit" id="AddUser">edit Post</button>
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

    <script src="{{ asset('src/js/posts.js') }}"></script>
@endsection
