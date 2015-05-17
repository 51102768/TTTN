@extends('master')

@section('header')
	<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/content.css") }}"
		/>
	<script type="text/javascript" src="{{ asset("js/jquery.jcarousel.pack.js")}}"></script>
@stop

@section('content')
	<div class="slider">
		<div class="slider-holder">
			<img src="img/slider/apple.jpg">
		</div>	
		<div class="slider-nav">
		</div>
	</div>
	<div class="product"></div>
	

@stop
