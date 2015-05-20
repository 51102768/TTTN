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
				<li><a href="brand?category_id={{$product->category->id}}">{{$product->category->brand}} </a><span class = "glyphicon glyphicon-circle-arrow-right"></span></li>
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
					Số lượng cần đặt: 
					<input type ="text" id = "quantity" value = "1">
					<br>
					<div class="btn-group-vertical" role="group">
						<a class="btn btn-success" id = "order_list">Đặt lên kệ hàng</a>
						<a class="btn btn-info" id = "view_info">Xem thêm thông tin sản phẩm</a>
					</div>
					</p>
				</div>
				<hr>
				</div>
			</div>
			<div class="row">
				<ul class="nav nav-tabs">
				  <li role="presentation" id="info"><a class = "btn" id = "info-btn">Thông tin thêm</a></li>
				  <li role="presentation" id = "des"><a class = "btn" id = "description">Lời miêu tả</a></li>
				  <li role="presentation" id = "add"><a class = "btn" id = "advice">Góp ý</a></li>
				</ul>
				<div class="product_info" style="display:none;">
						<ul class="list-group">
						<li class="list-group-item">Tên sản phẩm <p style="float: right">{{$product->name}}</p></li>
						<li class="list-group-item">Xuất xứ <p style="float: right">{{$product->origin}}</p></li>
						<li class="list-group-item">Màu <p style="float: right">{{$product->color}}</p></li>
						<li class="list-group-item">Trọng lượng <p style="float: right">{{$product->weight}} gram</p></li>
						<li class="list-group-item">Thời gian bảo hành <p style="float: right">{{$product->guarantee}} năm</p></li>
						</ul>
				</div>
				<div class="description_info" style="display:none;">
					<div class="panel panel-default">
					<div class="panel-body">
					<p>{{$product->description}}</p>
					</div>
					</div>
				</div>
				<div class="addvice_info" style="display:none;">
					  <div class="panel panel-danger">
				                <!-- /.panel-heading -->
				                <div class="panel-body">
				                      {{Form::open(array('url' => 'customer-message'))}}
				                    <div class="input-group">		
							{{ Form::text('name','',array('id'=>'name','class'=>'form-control','placeholder'=>'Nhập Họ tên'))}}

							{{ Form::text('phone','',array('id'=>'phone','class'=>'form-control','placeholder'=>'Nhập số điện thoại'))}}

							{{ Form::text('email','',array('id'=>'email','class'=>'form-control','placeholder'=>'Nhập địa chỉ Email '))}}
						
				                       	 {{ Form::textarea('message','',array('id'=>'btn-input','class'=>'form-control input-sm','placeholder'=>'Nhập kí tự ở đây... '))}}
				                            {{Form::submit('Gửi',array('class'=>'btn btn-danger','id'=>'btn-chat'))}}
				                            {{Form::close()}}
				                        </span>
				                <!-- /.panel-body -->
				                     </div>
				                </div>
				            </div>
				</div>
			</div>
		</div>

	</div>

	<script >
	link = $("#des");
	$("#description").click(function(){
		$(".description_info").show(100);
		$(".addvice_info").hide(200);
		$(".product_info").hide(200);
		$("#des").addClass("active");
		link.removeClass("active");
		
		link = $("#des");
	});

	$("#info-btn").click(function(){
		
		$(".description_info").hide(200);
		$(".addvice_info").hide(200);
		$(".product_info").show(100);
		link.removeClass("active");
		$("#info").addClass("active");
		link = $("#info");
	});

	$("#advice").click(function(){
		$(".addvice_info").show(100);
		$(".product_info").hide(200);
		$(".description_info").hide(200);
		link.removeClass("active");
		$("#add").addClass("active");
		link = $("#add");
	});

	$("#view_info").click(function(){
		$(".description_info").hide(200);
		$(".addvice_info").hide(200);
		$(".product_info").show(100);
		link.removeClass("active");
		$("#info").addClass("active");
		link = $("#info");
	});

	$("#order_list").click(function(e){
		e.preventDefault();	
		var d = {{$product->id}};
		var quantity = $("#quantity").attr("value");
		$.ajax({
			type:'POST',
			url:'order_list',
			data:"product_id="+d+"&quantity="+quantity,
			success:function(data){
				console.log(data);
				location.reload();
				alert("Bạn đã đặt thành công 1 sản phẩm!");	
			}
		});


	});

	</script>



@stop