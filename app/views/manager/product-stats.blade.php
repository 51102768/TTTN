@extends("manager.master")

@section("header")
	<link href="css/product.css" rel="stylesheet">

	
@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Thống kê sản phẩm</h1>
	</div>
</div>
<div class="row">
<div class="col-lg-8">
	<div class="row">
		<div class="product-high-panel panel panel-green">
		<div class="panel-heading">
			<i class="fa fa-bars fa-fw"></i>
			Sản phẩm bán chạy
			</div>	
		<div class="panel-body product-high">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Số thứ tự</th>
					<th>Sản phẩm</th>
					<th>Số lượt mua</th>
				</tr>
				@foreach($high_products as $product)
				<tr>
					<td style = "text-align: center">{{$count++}}</td>
					<td>{{$product->name}}</td>
					<td style = "text-align: center">{{$product->buytime}}</td>
				</tr>
				@endforeach
				{{--*/ $count = 1 /*--}}
			</table>
		</div>
		</div>
	</div>
	<div class="row">
		<div class="product-high-panel panel panel-green">
		<div class="panel-heading">
			<i class="fa fa-bars fa-fw"></i>
			Sản phẩm mới
			</div>	
		<div class="panel-body product-high">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Số thứ tự</th>
					<th>Sản phẩm</th>
				</tr>
				@foreach($new_products as $product)
				<tr>
					<td style = "text-align: center">{{$count++}}</td>
					<td>{{$product->name}}</td>
				</tr>
				@endforeach
				{{--*/ $count = 1 /*--}}
			</table>
		</div>
		</div>
	</div>
</div>
<div class="col-lg-4">
	<div class="row">
		<div class="product-high-panel panel panel-green">
		<div class="panel-heading">
			<i class="fa fa-bars fa-fw"></i>
			Các thương hiệu
			</div>	
		<div class="panel-body product-high">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Số thứ tự</th>
					<th>Thương hiệu</th>
					<th>Sản phẩm</th>
				</tr>
				@foreach($categories as $category)
				<tr>
					<td style = "text-align: center">{{$count++}}</td>
					<td>{{$category->brand}}</td>
					<td style = "text-align: center">{{$category->products->count()}}</td>
				</tr>
				@endforeach
				{{--*/ $count = 1 /*--}}
			</table>
		</div>
		</div>
	</div>
</div>
</div>


 @if(Session::has('message'))
	<script>
		alert('{{Session::get("message");}}');
	</script>
@endif

@stop

@section("script")

	<!-- jQuery -->
	<script src="bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>


	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js"></script>


@stop