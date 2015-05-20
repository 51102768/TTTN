@extends('master')
@section('header')
	<link
	type="text/css"
	rel="stylesheet"
	href="{{ asset("css/content.css") }}"
	/>
@stop
@section('content')
	@include("temp.carousel")

	<div class="row">
		@include("temp.sidebar")

		<div class="col-md-9 right-wrapper">
			<div class="row cold-md-4">
				<div class="title">
					<h3>Khuyến mãi</h3>				
					<h1>Hiện tại không có chương trình khuyến mãi.</h1>
				</div>				

			</div>			
		</div>
	</div>	
	@include('temp.footer')
@stop