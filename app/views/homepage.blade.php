@extends('master')

@section('header')
	<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/carousel.css") }}"
		/>
@stop

@section('content')
	<!--Bootstrap Carousel-->
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

	<!--Content-->
	<div class="row">
		<div class="col-md-2">
			<!--Search-->			
			<div class="search box">
				<form>
					<input type="text" name="keyword" text="Search ..."><input type="submit" value="Search">					
				</form>
			</div>			
		</div>

		<div class="col-md-8">
			<!--Hot Product-->			
			<div class="hot-product">
				<h2>Hot Product</h2>
			</div>
		</div>
	</div>		
	<!--Footer-->
	<div class="row">

	</div>
@stop
