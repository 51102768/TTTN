@extends("manager.master")

@section("header")
	<link href="css/product.css" rel="stylesheet">

@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sản phẩm</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<div class="category-panel panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-bars fa-fw"></i>
                            Thương hiệu
                        </div>	
                        <div class="panel-body category">
                        <div class="list-group list ">
                        @foreach($categories as $category)
		    <a href="#" data-category-id="{{$category->id}}" class="list-group-item link">
                                    <span class = "category-img text-center">
                                    <img src="{{$category->url}}" alt="User Avatar" class="img-thumbnail img-category" />
                                    </span>
                                    <div>
                                    <strong class="primary-font text-center" >{{$category->brand}}</strong>
                                    </div>
		    </a>
		 @endforeach
		 </div>
		 </div>
		 <div class="panel-footer ">
			<div class="row text-center">
				<button class = "btn btn-success" data-toggle="modal" data-target="#addModal">Thêm</button>
			</div>
		</div>
		 </div>
	</div>

	<div class="col-lg-4" id = "productWrapper">
		<div class="product-panel panel panel-red">
                        <div class="panel-heading">
                            <i class="fa fa-bars fa-fw"></i>
                            Sản phẩm
                        </div>	
                        <div class="panel-body product">
                        <div class="list-group list-product ">
		 </div>
		 </div>
		  <div class="panel-footer ">
			<div class="row text-center">
				<div class="btn-group">
				<button class = "btn btn-success" data-toggle="modal" data-target="#addProductModal">Thêm</button>
				<button class = "btn btn-danger" id = "removeProduct">Xóa</button>
				</div>
			</div>
		</div>
		 </div>
	</div>
	

</div>
<div id="addModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		{{ Form::open(array('url'=>'brand_img','files'=>true)) }}
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Thêm thương hiệu</h4>
		</div>
		<div class="modal-body">	
			 <div class="form-group">
				{{Form::label('brand','Thương hiệu :')}}
				{{ Form::text('brand','',array('class'=>'form-control','placeholder'=>'Gõ tên thương hiệu'))}}
			</div>
			<div class="form-group">
				{{Form::label('brandimg','Logo:')}}
				{{Form::file('image')}}
			</div>
		</div>
		<div class="modal-footer">
		{{ Form::submit('Hoàn tất',array('class'=>'btn btn-success'))}}
			<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		</div>
		{{ Form::close()}}
	</div>

	</div>
</div>

<div id="addProductModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		{{ Form::open(array('url'=>'add_product','files'=>true)) }}
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Thêm sản phẩm</h4>
		</div>
		<div class="modal-body">	
			 <div class="form-group">
				{{Form::label('name','Tên sản phẩm :')}}
				{{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Gõ tên sản phẩm '))}}
			</div>
			 <div class="form-group">
				{{Form::label('origin','Xuất xứ :')}}
				{{ Form::text('origin','',array('class'=>'form-control','placeholder'=>'Gõ xuất xứ '))}}
			</div>
			 <div class="form-group">
				{{Form::label('name','Tên sản phẩm :')}}
				{{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Gõ tên sản phẩm '))}}
			</div>
			<div class="form-group">
				{{Form::label('brandimg','Logo:')}}
				{{Form::file('image')}}
			</div>
		</div>
		<div class="modal-footer">
		{{ Form::submit('Hoàn tất',array('class'=>'btn btn-success'))}}
			<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		</div>
		{{ Form::close()}}
	</div>

	</div>
</div>
@if(Session::has('message'))
	<script>
		alert('{{Session::get("message");}}');
	</script>
@endif
@if ($errors->has('brand'))
	<script>
		alert('{{ $errors->first("brand") }}');
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

     <script>
    	$(document).ready(function(){
    		var d = "";
    		var tag = "";
    		$(".link").click(function(e){
			e.preventDefault();
			tag = $(this);
			$("#productWrapper").hide();
			d = $(this).attr("data-category-id");
			$.ajax({
				type:'GET',
				url:'product_info',
				data:"category_id="+d+"&action=open",
				success: function(data){
					$(".list-product").html("");
					console.log(data);
					if(data.length>0){
						for(var i in data){
							$(".list-product").append('<a href="#" data-product-id='+data[i].id+' class="list-group-item link-product"> <span class = "product-img pull-left"><img src='+data[i].url+' alt="User Avatar" class="img-thumbnail img-product" /></span><div><strong class="primary-font">'+data[i].name+'</strong><p><medium>'+data[i].origin+'</medium></p></div></a>');
							$("#productWrapper").show(500);
						}
					}
					else{
						$("#productWrapper").show(500);
					}
					
				}
			});
    		});
    	});
    </script>
@stop