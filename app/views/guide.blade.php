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
					<h3>Hướng dẫn mua hàng</h3>				
				</div>				
			</div>			
			<div class="row cold-md-4">
				<h4>Bước 1:</h4>
				<h4>Bước 1:</h4>
				<h4>Bước 1:</h4>
				<h4>Bước 1:</h4>
			</div>
		</div>
	</div>	
	@include('temp.footer')
@stop