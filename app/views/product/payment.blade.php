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
				<li class="active">Đặt hàng</li>
			</ol>
			</div>

			<div class="row product-wrapper">
				<div class="col-md-12">
					<h3>Đặt hàng</h3>
				</div>
				<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
				<div class=" customer-panel panel panel-danger">
		                        <div class="panel-heading">
			                            <i class="fa fa-shopping cart fa-fw"></i>
			                            Mặt hàng đã đặt
			                        </div>	
		                      <div class="panel-body customer"  id = "customer-content">
		                      	<table class="table table-striped table-bordered">
						<tr>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
						</tr>
						@foreach(Cart::content() as $row)
						<tr>
							<td>{{$row->name}}</td>
							<td class = "text-center">{{$row->qty}}</td>
							<td>{{$row->price}}</td>
						</tr>
						@endforeach
					</table>
				</div>
				<div class="panel-footer ">
					<div class="row text-center">
						<div class="btn-group" role="group" aria-label="...">
							<a type="button" class="btn btn-danger" id = "btn_remove" href="delete_cart">Xóa</a>
							<a type="button" class="btn btn-success" id = "btn_cart" href="ordered">Đặt hàng</a>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	@include('temp.footer')
@stop