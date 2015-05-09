<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Mỡ shop</title>
		@yield('header')
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
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("bootstrap/dist/css/bootstrap.theme.min.css") }}"
		/>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/shared.css") }}"
		/>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/footer.css") }}"
		/>
		<script
		type="text/javascript"
		src="{{ asset("js/jquery-1.11.2.min.js") }}"
		></script>
		<script
		type="text/javascript"
		src="{{ asset("bootstrap/js/modal.js") }}"
		></script>
		<script
		type="text/javascript"
		src="{{ asset("bootstrap/js/dropdown.js") }}"
		></script>
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
