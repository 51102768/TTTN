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
				<li class = "active">{{$category_link->brand}}</li>
			</ol>
			</div>

			<div class="row product-wrapper">
				<div class="col-md-12">
				<h3>{{$category_link->brand}}</h3>
				</div>

				<div class="row product">
				<ul id = "product-hot">
					@foreach($products as $product)
					<li class="product-box">
						<a href="item?product_id={{$product->id}}">					
							<img class ="img-thumbnail" src="{{$product->url}}">
							<div class="caption-span">			
							<p class="caption">{{$product->name}}</br>{{$product->price}} VNĐ</p>
							</div>	
							<img src="/public/img/mua-ngay.jpg">
						</a>
					</li>
					@endforeach
			</div>

			</div>
		</div>

	</div>

@stop