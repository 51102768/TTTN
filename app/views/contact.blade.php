@extends('master')
@section('header')
	<link
	type="text/css"
	rel="stylesheet"
	href="{{ asset("css/content.css") }}"
	/>
@stop
@section('content')
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
						<img src="/public/img/banner/banner_earpods.jpg">
						<div class="carousel-caption">
							<h3></h3>
							<p></p>
						</div>
					</div>

					<div class="item">
						<img src="/public/img/banner/beats_banner.jpg">
						<div class="carousel-caption">
							<h3></h3>
							<p></p>
						</div>
					</div>

					<div class="item">
						<img src="/public/img/banner/lehmann_banner.jpg">
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

	<div class="row">
		<div class="col-md-3">				
			<div class="category">
				<div id='cssmenu'>
				<ul>
					<li class="active has-sub"><a href="#"><span>Apple</span></a>
						<ul>
							<li class="has-sub"><a href="#"><span>iPhone</span></a>
								<ul>
									<li class="last"><a href="#"><span>iPhone 3</span></a></li>
									<li class="last"><a href="#"><span>iPhone 4</span></a></li>
								</ul>
							</li>
							<li class="has-sub"><a href="#"><span>iPad</span></a>
								<ul>
									<li class="last"><a href="#"><span>iPad 2</span></a></li>
									<li class="last"><a href="#"><span>iPad Air</span></a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="#">AstellandKern</a></li>
					<li><a href="#">AudioTechnica</a></li>
					<li><a href="#">Bose</a></li>
					<li><a href="#">Braven</a></li>
					<li><a href="#">Earmac</a></li>
					<li><a href="#">Soundmax</a></li>
				</ul>
				</div>
			</div>			
		</div>

		<div class="col-md-9 right-wrapper">
			<div class="row cold-md-4">
				<div class="title">
					<h3>Liên hệ</h3>				
				</div>				
			</div>
			<div class="row cold-md-4">
					<form>
						<div class="form-group">
							<label for="name">Họ tên:</label>
							<input type="text" class="form-control" id="name" placeholder="Nhập Họ tên">							
							<label for="email">Điện thoại:</label>
							<input type="text" class="form-control" id="email" placeholder="Nhập số điện thoại">
							<label for="email">Địa chỉ Email:</label>
							<input type="text" class="form-control" id="email" placeholder="Nhập địa chỉ Email">							
							<label for="message">Nội dung:</label>
							<textarea class="form-control" rows="3"></textarea>
						</div>
						<button type="Submit" class="btn btn-default">Gửi</button>

					</form>
				</div>

			
		</div>
	</div>	
	@include('temp.footer')
@stop