<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">

	    <title>@yield('title')</title>

	    <!-- Fonts -->
	    <link rel="stylesheet" href="{{ asset('src/css/font-awesome.min.css') }}">

	    <!-- Styles -->
	    <link rel="stylesheet" href="{{ asset('src/css/bootstrap.min.css') }}">
	     <link href="{{ asset('src/css/main.css') }}" rel="stylesheet">
		@yield('styles')
	</head>

	<body>
		@include('includes.header')
		<div class="container">
		  @yield('content')
		</div>
		@include('includes.footer')
	</body>
</html>
