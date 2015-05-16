@extends("manager.master")

@section("header")
<link href="css/order.css" rel="stylesheet">

@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Đơn hàng</h1>
	</div>
</div>

<div class="row">
                <div class="col-lg-12">

                    <!-- /.panel -->
                    <div class="order-panel panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-shopping-cart fa-fw"></i>
                            Đơn hàng
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body order">
                        	<div class="row row-order">
                        		<div class="col-md-1 col-order text-center">
                        			STT
                        		</div>
                        		<div class="col-md-2 col-order">Đơn hàng</div>
                        		<div class="col-md-2 col-order">Khách hàng</div>
                        		<div class="col-md-7 col-order">
                        		<div class="row">
                        		<div class="col-md-10 col-order">
                        						Sản phẩm</div>
                        		<div class="col-md-2 col-order">Số lượng</div>
                        		</div>
                        		</div>
                        	</div>
                        	<div class="list">
			@foreach($orders as $order)
			<div class="row row-order">
				<div class="col-md-1 col-order text-center" >
					<p>{{$count++}}</p>
					<p><a href="#"  data-order-id ="{{$order->id}}" id = "link"> <i class="fa fa-check-square-o fa-fw"></i></a></p>
				</div>
				<div class="col-md-2 col-order">{{$order->created_at}}</div>
				<div class="col-md-2 col-order text-left">{{$order->account->email}}</div>
				<div class="col-md-7 col-order">
					@foreach($order->orderItems as $orderItem)
						<div class="row">
							<div class = "col-md-10 col-order">
								{{Product::where("id","=",$orderItem->product_id)->first()->name}}
							</div>
							<div class="col-md-2 col-order text-center">
								{{$orderItem->quantity}}
							</div>
						</div>
					@endforeach
				</div>
                        	</div>
			@endforeach
			</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
</div>
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
		$(".list a").click(function(e){
			e.preventDefault();

			var tag = $(this);
			var d = $(this).attr("data-order-id");
			console.log(d);
			$.ajax({
				type:'GET',
				url:'order_check',
				data:"order_id="+d,
				success: function(data){
					tag.closest('div[class^="row"]').slideUp("500", function() { $(this).remove(); } );
					console.log(data);
				}
			});
		});
	});
    </script>

@stop
