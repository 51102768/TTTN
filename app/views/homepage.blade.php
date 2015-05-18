@extends('master')

@section('header')

<<<<<<< HEAD
	<link
	type="text/css"
	rel="stylesheet"
	href="{{ asset("css/content.css") }}"
	/>
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

	<!--Row 2-->
	<div class="row">
		<div class="col-md-3">				
			<div class="row category">
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
			<div class="row product">
				<div class="title">
					<h3>Sản phẩm bán chạy</h3>				
				</div>				
			</div>
			<!--Hot Product-->			
			<div class="row product">
				<ul id = "product-hot">
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Apple/earpods.jpg">									
							<p class="caption">Tai nghe Earpods</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">						
						</a>
					</li>
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Apple/headphones.jpg">									
							<p class="caption">Tai nghe Headphones</br>200,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>						
					</li>
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Apple/ipod-touch.jpg">									
							<p class="caption">Ipod Touch</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>						
					</li>
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Bose/IE2.jpg">									
							<p class="caption">Tai nghe IE2</br>600,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>						
					</li>
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Bose/QC25.jpg">									
							<p class="caption">Tai nghe QC25</br>550,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Shure/se112.jpg">									
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>					
				</ul>
				<div class="more">
					<a href="#">Xem thêm</a>
				</div>
			</div>

			<div class="row product">
				<div class="title">
					<h3>Sản phẩm mới</h3>
				</div>
			</div>
			<div class="row product">
				<ul id="product-new">
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Apple/earpods.jpg">							
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>		
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Apple/ipod-touch.jpg">							
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>		
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Shure/se112.jpg">									
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>		
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Shure/se112.jpg">									
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>		
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Shure/se112.jpg">									
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>		
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Apple/ipod-touch.jpg">							
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>		
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Shure/se112.jpg">									
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>		
					<li class="product-box">
						<a href="#">					
							<img src="/public/img/product/Bose/SIE2.jpg">								
							<p class="caption">Tai nghe SE112</br>300,000 đ</p>
							<img src="/public/img/mua-ngay.jpg" class="buynow">
						</a>
					</li>													
				</ul>
				<div class="more">
					<a href="#">Xem thêm</a>
				</div>
			</div>
		</div>
	</div>		
	<!--Footer-->	
	@include('temp.footer')
	
@stop
