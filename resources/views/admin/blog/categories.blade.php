@extends('layouts.admin-master')

@section('content')
	@include('includes.infoBox')
	<div class="alert alert-success hidden" id="msg"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  	<div class="panel-heading">
					<a href="#" class="btn btn-success btn-sm" id="addNewCat">new category</a>
			  	</div>
			  	<div class="panel-body">
					@if (count($categories) === 0)
						<div class="alert alert-info">no $categories</div>
					@else
						@foreach ($categories as $category)
							<article class="posts">
								<div class="id" data-id="{{$category->id}}"></div>
								<p class="post-info">
									<h3 class="post-title">{{$category->name}}</h3>
								</p>
								<div class="edit">
									<ul>
										<li class="hidden"><input type="text"/></li>
										<li><a href="#" class="editBtn saveBtn">edit | </a></li>
										<li><a href="{{ route('delete.cat', ['category_id' => $category->id]) }}" class="delete">delete</a></li>
									</ul>
								</div>
							</article>
						@endforeach
						@if ($categories->lastPage() > 1)
							<div class="row">
								<div class="pagination col-lg-12 text-center">
									{!! $categories->render() !!}
								</div>
							</div>
						@endif
					@endif
			  	</div>
			  	<div class="panel-footer">
					Total categories: {{ count($categoriesCount) }}

			  	</div>
			</div>
	  	</div>
	</div>
	<!-- Start Add Modal -->
	<div class="modal fade" id="Add-catModel" role="dialog" tabindex="-1">
	  <div class="modal-dialog" role="document">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>

				  <h4 class="modal-title">Add category</h4>
			  </div>

			  <div class="modal-body">
				 <form action="" method="post">
					{{ csrf_field() }}
					{{-- Start Username --}}
				  <div class="form-group row">
					  <label class="col-sm-2 col-form-label" for="name">category</label>
					  <div class="col-sm-10">
						  <input type="text" class="form-control" id="name" name="name">
					  </div>
				  </div>
					{{-- End Username --}}
					<div class="modal-footer">
					    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
					    <button class="btn btn-primary" type="submit" id="addCat">Add Category</button>
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
		var url = "{{ route('add.cat') }}" ;
		var urlEdit = "{{ route('edit.cat') }}" ;
	</script>
    <script src="{{ asset('src/js/category.js') }}"></script>
@endsection
