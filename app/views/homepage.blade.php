@extends('master')

@section('header')
	<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/carousel.css") }}"
		/>
	<script type="text/javascript" src="{{ asset("js/jquery.jcarousel.pack.js")}}"></script>
@stop

@section('content')
	<div class="row">
	<div class="slider">
		<div id="myCarousel" class="carousel slide" data-interval="2000" data-ride="carousel">
			<!-- Indicators-->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>			
				<li data-target="#myCarousel" data-slide-to="2"></li>	
			</ol>
			 <!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="active item">
					<img src="/public/img/slider/apple.jpg">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
				</div>

				<div class="item">
					<img src="/public/img/slider/techina.jpg">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
				</div>

				<div class="item">
					<img src="/public/img/slider/philips.jpg">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
				</div>
			</div>
			<!-- Left and right controls -->
			<a href="#myCarousel" class="left carousel-control" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
			</a>
			<a href="#myCarousel" class="right carousel-control" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
			</a>
		</div>		
	</div>
	</div>
	<div class="product"></div>
	

@stop
