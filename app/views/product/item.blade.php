@extends('master')
@section('header')
	<link type="text/css" rel="stylesheet" href="{{ asset("css/content.css") }}"/>
	<link type="text/css" rel="stylesheet" href="{{ asset("css/item.css") }}"/>
@stop
@section('content')
	@include("temp.carousel")

	<div class="row">
		@include("temp.sidebar")

		<div class="col-md-9 right-wrapper">
			<div class="row">
			<ol class="breadcrumb" id = "bread">
				<li><a href="{{URL::to('/')}}">Trang chủ </a><span class = "glyphicon glyphicon-circle-arrow-right"></span></li>
				<li><a href="brand?{{$product->category->id}}">{{$product->category->brand}} </a><span class = "glyphicon glyphicon-circle-arrow-right"></span></li>
				<li class = "active">{{$product->name}} </li>
			</ol>
			</div>
			<div class="row product-wrapper">
				<div class="col-md-12">
				<h3>{{$product->name}}</h3>
				</div>
				<div class="row">
				<div class="col-lg-4">
					<div class="img-wrapper">
					<img src="{{$product->url}}" width="100%" height="100%">
					</div>
					<p style="padding-left:15px; color:white"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> 
						<a href="javascript:print();" style="style:none">In trang</a>
					</p>
				</div>
				<div class="col-lg-8">
					<p>Sản phẩm: {{$product->name}}</p>
					<p class = "price">{{$product->price}} VND</p>
					<p class = "note">"Hàng chính hãng, giá đã bao gồm 10% VAT"
						<br>
						<i>Giảm 10% cho lần đầu mua phụ kiện, cài đặt miễn phí trọn đời máy</i>
					</p>
					<p>Số lượng còn lại: {{$product->stock}}</p>
					<p>
					<div class="btn-group-vertical" role="group">
						<a class="btn btn-success">Đặt lên kệ hàng</a>
						<a class="btn btn-info" id = "view_info">Xem thêm thông tin sản phẩm</a>
					</div>
					</p>
				</div>
				<hr>
				</div>
			</div>
			<div class="row">
				<ul class="nav nav-tabs">
				  <li role="presentation" id="info"><a class = "btn" id = "info">Thông tin thêm</a></li>
				  <li role="presentation" id = "des"><a class = "btn" id = "description">Lời miêu tả</a></li>
				</ul>
				<div class="product_info" style="display:none;">
						<ul class="list-group">
						<li class="list-group-item">Tên sản phẩm <p style="float: right">{{$product->name}}</p></li>
						<li class="list-group-item">Xuất xứ <p style="float: right">{{$product->origin}}</p></li>
						<li class="list-group-item">Màu <p style="float: right">{{$product->color}}</p></li>
						<li class="list-group-item">Trọng lượng <p style="float: right">{{$product->weight}}</p></li>
						<li class="list-group-item">Thời gian bảo hành <p style="float: right">{{$product->guarantee}} năm</p></li>
						</ul>
				</div>
				<div class="description_info" style="display:none;">
					<div class="panel panel-default">
					<div class="panel-body">
					{{$product->description}}
					</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<script >
	$("#description").click(function(){
		$("#info").removeClass("active");
		$(".product_info").hide(200);
		$(".description_info").show(100);
		$("#des").addClass("active");
	});

	$("#info").click(function(){
		$("#des").removeClass("active");
		$(".description_info").hide(200);
		$(".product_info").show(100);
		$("#info").addClass("active");
	});

	$("#view_info").click(function(){
		$(".product_info").show(100);
		$("#info").addClass("active");
	});

	</script>



@stop