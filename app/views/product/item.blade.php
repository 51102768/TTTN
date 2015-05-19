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

		</div>

	</div>

@stop