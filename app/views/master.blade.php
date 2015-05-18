<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Mỡ shop</title>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("bootstrap/dist/css/bootstrap.css") }}"
		/>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("bootstrap/dist/css/bootstrap.min.css") }}"
		/>
		<script
		type="text/javascript"
		src="{{ asset("js/jquery-1.11.2.min.js") }}"
		></script>
		<script
		type="text/javascript"
		src="{{ asset("bootstrap/dist/js/bootstrap.js") }}"
		></script>
		<script src="/bootstrap/js/bootstrap.min.js"
		></script>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/shared.css") }}"
		/>	
		@yield('header')
	</head>
	<body>
		@if(!Auth::user())
			@include('temp.navbar')
		@else
			@include('temp.navbaruser')
		@endif

		<div class="content">
			<div class="container">
				@yield('content')
			</div>
		</div>
		@if(Session::has('message'))
			<script>
				alert('{{Session::get("message");}}');
			</script>
		@endif
	</body>
</html>
