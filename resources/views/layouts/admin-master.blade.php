<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">

	    <title>Admin Area</title>

	    <!-- Fonts -->
	    <link rel="stylesheet" href="{{ asset('src/css/font-awesome.min.css') }}">

	    <!-- Styles -->
	    <link rel="stylesheet" href="{{ asset('src/css/bootstrap.min.css') }}">
	     <link href="{{ asset('src/css/admin.css') }}" rel="stylesheet">
		@yield('styles')
	</head>

	<body>
		@include('includes.admin-header')
		<div class="container">
		  @yield('content')
		</div>
		<script type="text/javascript">
			var baseUrl = "{{ URL::to('/') }}";
			
		</script>
		<script src="{{ asset('src/js/jquery-3.1.0.min.js') }}"></script>
		<script src="{{ asset('src/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('src/js/jquery.nicescroll.min.js') }}"></script>
		@yield('scripts')
	</body>
</html>
