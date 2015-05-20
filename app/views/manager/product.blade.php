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
				<button class = "btn btn-danger" id = "removeCategory">Xóa</button>
			</div>
		</div>
		 </div>
	</div>

	<div class="col-lg-4" id = "productWrapper">
		<div class="product-panel panel panel-green">
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
				<button class = "btn btn-success" data-toggle="modal" data-target="#addProductModal">Thêm</button>
				<button class = "btn btn-danger" id = "removeProduct">Xóa</button>
			</div>
		</div>
		 </div>
	</div>

	<div class="col-lg-4" id = "productInfoWrapper">
		<table class = "table table-striped table-bordered">
			<tr>
				<td>Tên sản phẩm</td>
				<td><div  id="nameProduct"></div></td>
			</tr>
			<tr>
				<td>Xuất xứ</td>
				<td><div id="originProduct"></div></td>
			</tr>
			<tr>
				<td>Trọng lượng</td>
				<td><div id="weightProduct"></div></td>
			</tr>
			<tr>
				<td>Màu</td>
				<td><div id="colorProduct"></div></td>
			</tr>
			<tr>
				<td>Bảo hành</td>
				<td><div id="guaranteeProduct"></div></td>
			</tr>
			<tr>
				<td>Số lượng</td>
				<td><div id="stockProduct"></div></td>
			</tr>
			<tr>
				<td>Giá</td>
				<td><div id = "priceProduct"></div></td>
			</tr>
		</table>
	</div>
	

</div>
<div id="addModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		{{ Form::open(array('url'=>'brand_img','files'=>true,"method"=>"post","id"=>"brandForm")) }}
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Thêm thương hiệu</h4>
		</div>
		<div class="modal-body">	
			 <div class="form-group">
				<p>{{Form::label('brand','Thương hiệu:')}}
				{{ Form::text('brand','',array('class'=>'form-control','placeholder'=>'Gõ tên thương hiệu','data-validation'=>'required',"data-validation-error-msg"=>"Vui lòng điển đầy đủ thông tin "))}}
				</p>
			</div>
			<div class="form-group">
				<p>{{Form::label('brandimg','Logo:')}}
				{{Form::file('image',array( "data-validation"=>"required","data-validation-allowing"=>"jpg, png, gif","data-validation-error-msg-required"=>"Hãy chọn file ","data-validation-error-msg-extension"=>"Phải là file hình ảnh"))}}</p>
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
		{{ Form::open(array('url'=>'product_add','files'=>true,"id"=>"productForm")) }}
		<input type="hidden" name="category_id" value = "" id= "categoryID">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Thêm sản phẩm</h4>
		</div>
		<div class="modal-body">	
			 <div class="form-group">
				<p>{{Form::label('name','Tên sản phẩm :')}}
				{{ Form::text('name','',array('id'=>'name','class'=>'form-control','placeholder'=>'Gõ tên sản phẩm ','data-validation'=>'required','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin '))}}
				<p><div  id = "name-error" style="display:none;" class="alert alert-danger" role="alert"></div></p>
				</p>
			</div>
			 <div class="form-group">
				<p>{{Form::label('origin','Xuất xứ :')}}
				{{ Form::text('origin','',array('id'=>'origin','class'=>'form-control','placeholder'=>'Gõ xuất xứ ','data-validation'=>'required','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin '))}}
				<p ><div id = "origin-error" style="display:none"  class="alert alert-danger" role="alert"></div></p>
				</p>
			</div>
			 <div class="form-group">
				<p>{{Form::label('weight','Cân nặng :')}}
				{{ Form::text('weight','',array('id'=>'weight','class'=>'form-control','placeholder'=>'Cân nặng ','data-validation'=>'required number','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin ',"data-validation-error-msg-number"=>"Vui lòng nhập số"))}}
				<p ><div id = "weight-error" style="display:none" class="alert alert-danger" role="alert"></div></p></p>
			</div>
			 <div class="form-group">
				<p>{{Form::label('color','Màu :')}}
				{{ Form::text('color','',array('id'=>'color','class'=>'form-control','placeholder'=>'Màu ','data-validation'=>'required','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin '))}}
				<p><div id = "color-error" style="display:none" class="alert alert-danger" role="alert"></div></p></p>
			</div>
			 <div class="form-group">
				<p>{{Form::label('guarantee','Năm bảo hành :')}}
				{{ Form::text('guarantee','',array('id'=>'guarantee','class'=>'form-control','placeholder'=>'Năm bảo hành ','data-validation'=>'required number','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin ',"data-validation-error-msg-number"=>"Vui lòng nhập số"))}}
				<p><div  id = "guarantee-error" style="display:none" class="alert alert-danger" role="alert"></div></p></p>
			</div>
			 <div class="form-group">
				<p>{{Form::label('stock','Số lượng :')}}
				{{ Form::text('stock','',array('id'=>'stock','class'=>'form-control','placeholder'=>'Số lượng ','data-validation'=>'required number','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin ',"data-validation-error-msg-number"=>"Vui lòng nhập số"))}}
				<p><div id = "stock-error" style="display:none" class="alert alert-danger" role="alert"></div></p></p>
			</div>
			 <div class="form-group">
				<p>{{Form::label('price','Giá :')}}
				{{ Form::text('price','',array('id'=>'price','class'=>'form-control','placeholder'=>'Giá VNĐ ','data-validation'=>'required number','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin ',"data-validation-error-msg-number"=>"Vui lòng nhập số"))}}
				 <p><div id = "price-error" style="display:none" class="alert alert-danger" role="alert"></div></p></p>
			</div>
			 <div class="form-group">
				<p>{{Form::label('price','Giá :')}}
				{{ Form::select('type',$types,array('class'=>"form-control"))}}
				 <p><div id = "price-error" style="display:none" class="alert alert-danger" role="alert"></div></p></p>
			</div>
			<div class="form-group">
				<p>{{Form::label('brandimg','Hình ảnh :')}}
				{{Form::file('product_image',array( "data-validation"=>"required","data-validation-allowing"=>"jpg, png, gif","data-validation-error-msg-required"=>"Hãy chọn file ","data-validation-error-msg-extension"=>"Phải là file hình ảnh"))}}</p>
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

	<script type="text/javascript" src="js\form-validator\jquery.form-validator.min.js"></script>

	<script>
		$.validate({
		form : '#brandForm, #productForm'
	});
	</script>

	 <script>     
	 	function isInArray(value, array) {
	  return array.indexOf(value) > -1;
	}

		$(document).ready(function(){
			var d = "";
			var tag = "";
			var d_product = "";
			var tag_product = "";
			$(".link").click(function(e){
			e.preventDefault();
			tag = $(this);
			$("#productInfoWrapper").hide(300);
			$("#productWrapper").hide();
			d = $(this).attr("data-category-id");
			$("#categoryID").attr("value",d);
			$.ajax({
				type:'GET',
				url:'product_info',
				data:"category_id="+d+"&action=open",
				success: function(data){
					$(".list-product").html("");
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
			$("#removeCategory").click(function(e){
				e.preventDefault();
				
				$.ajax({
					type:'POST',
					url:'category_remove',
					data:"category_id="+d,
					success:function(data){
						tag.slideUp("500", function() { $(this).remove(); } );
						$("#productWrapper").slideUp(500);
						$("#productInfoWrapper").slideUp(200);
					}
				});
			});
			$(document).on("click",".link-product",function(e){
				console.log("hello");
			e.preventDefault();
			tag_product = $(this);
			$("#productInfoWrapper").hide();
			d_product = $(this).attr("data-product-id");
			
			$.ajax({
				type:'GET',
				url:'product_info_table',
				data:"product_id="+d_product,
				success: function(data){
					console.log(data);
					$("#nameProduct").html(data.name);
					$("#originProduct").html(data.origin);
					$("#weightProduct").html(data.weight);
					$("#colorProduct").html (data.color);
					$("#guaranteeProduct").html(data.guarantee);
					$("#stockProduct").html(data.stock);
					$("#priceProduct").html(data.price);
					$("#productInfoWrapper").show(300);
				}
			});
			});
			$("#removeProduct").click(function(e){
				e.preventDefault();
				
				$.ajax({
					type:'POST',
					url:'product_remove',
					data:"product_id="+d_product,
					success:function(data){
						tag_product.slideUp("500", function() { $(this).remove(); } );
						$("#productInfoWrapper").slideUp(200);
					}
				});
			});
		});
	</script>
@stop