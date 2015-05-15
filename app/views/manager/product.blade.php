@extends("manager.master")

@section("header")
	<link href="css/product.css" rel="stylesheet">

	<script>
	function validateForm() {
	    var x = document.forms["addProductForm"]["name"].value;
	    if (x == null || x == "") {
	    	  $("#name-error").html("Vui lòng điền đầy đủ thông tin");
	        $("#name-error").show(300);
	        return false;
	    }
	    var x = document.forms["addProductForm"]["origin"].value;
	    if (x == null || x == "") {
	    	  $("#origin-error").html("Vui lòng điền đầy đủ thông tin");
	        $("#origin-error").show(300);
	        return false;
	    }
	    var x = document.forms["addProductForm"]["weight"].value;
	    if (x == null || x == "") {
	    	  $("#weight-error").html("Vui lòng điền đầy đủ thông tin");
	        $("#weight-error").show(300);
	        return false;
	    }
	    if (isNaN(x)) {
	    	  $("#weight-error").html("Kí tự phải là số");
	        $("#weight-error").show(300);
	        return false;
	    }
	    var x = document.forms["addProductForm"]["color"].value;
	    if (x == null || x == "") {
	    	  $("#color-error").html("Vui lòng điền đầy đủ thông tin");
	        $("#color-error").show(300);
	        return false;
	    }
	    var x = document.forms["addProductForm"]["guarantee"].value;
	    if (x == null || x == "") {
	    	  $("#guarantee-error").html("Vui lòng điền đầy đủ thông tin");
	        $("#guarantee-error").show(300);
	        return false;
	    }
	    if (isNaN(x)) {
	    	  $("#guarantee-error").html("Kí tự phải là số");
	        $("#guarantee-error").show(300);
	        return false;
	    }
	    var x = document.forms["addProductForm"]["stock"].value;
	    if (x == null || x == "") {
	    	  $("#stock-error").html("Vui lòng điền đầy đủ thông tin");
	        $("#stock-error").show(300);
	        return false;
	    }
	    if (isNaN(x)) {
	    	  $("#stock-error").html("Kí tự phải là số");
	        $("#stock-error").show(300);
	        return false;
	    }
	    var x = document.forms["addProductForm"]["price"].value;
	    if (x == null || x == "") {
	    	  $("#price-error").html("Vui lòng điền đầy đủ thông tin");
	        $("#price-error").show(300);
	        return false;
	    }
	    if (isNaN(x)) {
	    	  $("#price-error").html("Kí tự phải là số");
	        $("#price-error").show(300);
	        return false;
	    }
	}
	</script>
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
				{{Form::label('brand','Thương hiệu:')}}
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
		{{ Form::open(array('url'=>'product_add','files'=>true,"onsubmit"=>"return validateForm()")) }}
		<input type="hidden" name="category_id" value = "" id= "categoryID">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Thêm sản phẩm</h4>
		</div>
		<div class="modal-body">	
			 <div class="form-group">
				{{Form::label('name','Tên sản phẩm :')}}
				{{ Form::text('name','',array('id'=>'name','class'=>'form-control','placeholder'=>'Gõ tên sản phẩm '))}}
				<p><div  id = "name-error" style="display:none;" class="alert alert-danger" role="alert"></div></p>
			</div>
			 <div class="form-group">
				{{Form::label('origin','Xuất xứ :')}}
				{{ Form::text('origin','',array('id'=>'origin','class'=>'form-control','placeholder'=>'Gõ xuất xứ '))}}
				<p ><div id = "origin-error" style="display:none"  class="alert alert-danger" role="alert"></div></p>
			</div>
			 <div class="form-group">
				{{Form::label('weight','Cân nặng :')}}
				{{ Form::text('weight','',array('id'=>'weight','class'=>'form-control','placeholder'=>'Cân nặng '))}}
				<p ><div id = "weight-error" style="display:none" class="alert alert-danger" role="alert"></div></p>
			</div>
			 <div class="form-group">
				{{Form::label('color','Màu :')}}
				{{ Form::text('color','',array('id'=>'color','class'=>'form-control','placeholder'=>'Màu '))}}
				<p><div id = "color-error" style="display:none" class="alert alert-danger" role="alert"></div></p>
			</div>
			 <div class="form-group">
				{{Form::label('guarantee','Năm bảo hành :')}}
				{{ Form::text('guarantee','',array('id'=>'guarantee','class'=>'form-control','placeholder'=>'Năm bảo hành '))}}
				<p><div  id = "guarantee-error" style="display:none" class="alert alert-danger" role="alert"></div></p>
			</div>
			 <div class="form-group">
				{{Form::label('stock','Số lượng :')}}
				{{ Form::text('stock','',array('id'=>'stock','class'=>'form-control','placeholder'=>'Số lượng '))}}
				<p><div id = "stock-error" style="display:none" class="alert alert-danger" role="alert"></div></p>
			</div>
			 <div class="form-group">
				{{Form::label('price','Giá :')}}
				{{ Form::text('price','',array('id'=>'price','class'=>'form-control','placeholder'=>'Giá VNĐ '))}}
				 <p><div id = "price-error" style="display:none" class="alert alert-danger" role="alert"></div></p>
			</div>
			<div class="form-group">
				{{Form::label('brandimg','Hình ảnh :')}}
				{{Form::file('product_image')}}
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
@if(Session::has('log'))
	<script>
		alert('{{Session::get("log");}}');
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
     	function isInArray(value, array) {
	  return array.indexOf(value) > -1;
	}

    	$(document).ready(function(){
    		var d = "";
    		var tag = "";
    		$(".link").click(function(e){
			e.preventDefault();
			tag = $(this);
			$("#productWrapper").hide();
			d = $(this).attr("data-category-id");
			$("#categoryID").attr("value",d);
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
    		$("#removeCategory").click(function(e){
    			e.preventDefault();
    			
    			$.ajax({
    				type:'GET',
    				url:'category_remove',
    				data:"category_id="+d,
    				success:function(data){
    					tag.slideUp("500", function() { $(this).remove(); } );
    					$("#productWrapper").slideUp(500);
    					console.log(data);
    				}
    			});
    		});
    	});
    </script>
@stop