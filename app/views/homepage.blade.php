@extends('master')

@section('header')
	<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/carousel.css") }}"
		/>
<<<<<<< HEAD
	<link
	type="text/css"
	rel="stylesheet"
	href="{{ asset("css/content.css") }}"
	/>
	<script type="text/javascript" src="{{ asset("js/jquery.jcarousel.pack.js")}}"></script>
=======
>>>>>>> df8dae5556c7d0ce311f8f68b811033d3d9d3083
@stop

@section('content')
	<!--Bootstrap Carousel-->
	<div class="row">
		<div class="slider">
			<div id="myCarousel" class="carousel slide" data-interval="5000" data-ride="carousel">
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

	<!--Row 1-->
	<div class="row label">
		<div class="col-md-3">			
			<div class="title">
				<h3>Danh mục sản phẩm</h3>					
			</div>
		</div>
		<div class="col-md-9">
			<div class="title">
				<h3>Hot Product</h3>				
			</div>
		</div>
	</div>
	<!--Row 2-->
	<div class="row content">
		<div class="col-md-3">	
			<div class="category">
				<ul>
					<li><a href="#">Apple</a></li>
					<li><a href="#">AstellandKern</a></li>
					<li><a href="#">AudioTechnica</a></li>
					<li><a href="#">Bose</a></li>
					<li><a href="#">Braven</a></li>
					<li><a href="#">Earmac</a></li>
					<li><a href="#">Soundmax</a></li>
				</ul>
			</div>			
		</div>

		<div class="col-md-9">
			<!--Hot Product-->			
			<div class="product hot">
				<ul>
					<li><a href="#"><img src="/public/img/product/Apple/earpods.jpg"></a></li>
					<li><a href="#"><img src="/public/img/product/Apple/ipod-touch.jpg"></a></li>
					<li><a href="#"><img src="/public/img/product/Bose/SIE2.jpg"></a></li>
					<li><a href="#"><img src="/public/img/product/Bose/SIE2.jpg"></a></li>
				</ul>
			</div>
		</div>
	</div>		
	<!--Footer-->
	<div class="row">

	</div>
@stop
