@extends('master')
@section('header')
	<link
	type="text/css"
	rel="stylesheet"
	href="{{ asset("css/content.css") }}"
	/>
	<link
	type="text/css"
	rel="stylesheet"
	href="{{ asset("css/guide.css") }}"
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
				<div class="guide">				
				<h4>Bước 1: Tìm kiếm sản phẩm</h4>				
				<img src="/public/img/guide/1.png">				
				<h4>Bước 2: Chọn sản phẩm</h4>
				<img src="/public/img/guide/2.png">
				<h4>Bước 3: Thêm sản phẩm vào giỏ hàng</h4>			
				<img src="/public/img/guide/3.png">	
				<h4>Bước 4: Đặt hàng</h4>
				<img src="/public/img/guide/4.png">	
				<h4>Bước 5: Xác nhận đặt hàng thành công</h4>
				<img src="/public/img/guide/5.png">	
				</div>
				<h1>Cảm ơn quý khách đã ghé thăm!</h1>
			</div>
		</div>
	</div>	
	@include('temp.footer')
@stop