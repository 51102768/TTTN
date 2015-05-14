 @extends("manager.master")

@section("header")
<link href="css/customer.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bowlby+One+SC" />
@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Quản lí người dùng</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="customer-panel panel panel-red">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i>
                            Người dùng
                        </div>	
                        <div class="panel-body customer">
                        <div class="list-group list ">
                        @foreach($users as $user)
		    <a href="#" data-user-id="{{$user->id}}" class="list-group-item link">
                                    <span class = "custom-img pull-left">
                                    <img src="{{$user->url}}" alt="User Avatar" class="img-thumbnail img-custom" />
                                    </span>
                                    <div>
                                    <strong class="primary-font">{{$user->fullname}}</strong>
                                            <p><medium>
                                                 {{ucwords($user->authority)}}
                                     </medium></p>
                                     </div>
		    </a>
		 @endforeach
		 </div>
		 </div>
		 </div>
	</div>
	<div class="col-lg-4" style = "display:none" id = "customerWrap">
		<div class="customer-panel panel panel-red">
	                        <div class="panel-heading">
		                            <i class="fa fa-user fa-fw"></i>
		                            Thông tin người dùng
		                        </div>	
	                         <div class="panel-body customer"  id = "customer-content">
			<div class="row text-center">
				<img src="" id = "customer-ava" class = "img-thumbnail" width="50%" height="50%">
			</div>
			<div class="row text-center" style="padding:15px;">
				<p id = "fullname"></p>
				<p id = "username"></p>
				<p id = "email"></p>
				<p id="phone"></p>
				<p id="address"></p>
			</div>
			<div class= "row" id = "upgradeWrapper">
				<p id = "authority"></p>
				<div class="btn-group ">
					<button type="button" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
					Select Level <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" class = "level">User</a></li>
						<li><a href="#" class = "level">VIP</a></li>
						<li><a href="#" class = "level">Admin</a></li>
					</ul>
				</div>
			</div>
			</div>
			<div class="panel-footer ">
				<div class="row text-center">
					<div class="btn-group" role="group" aria-label="...">
						<button type="button" class="btn btn-danger" id = "btn_remove">Xóa</button>
						<button type="button" class="btn btn-primary" id = "btn_block" data-user-status="unblocked">Chặn</button>
						<button type="button" class="btn btn-success" id = "btn_upgrade" data-upgrade = "upgrade">Nâng cấp</button>
					</div>
				</div>
			</div>
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
    		var d = "";
    		var tag = "";
    		$(".link").click(function(e){
			e.preventDefault();
			tag = $(this);
			$("#customerWrap").hide();
			d = $(this).attr("data-user-id");
			$.ajax({
				type:'GET',
				url:'user',
				data:"user_id="+d+"&action=open",
				success: function(data){
					$("#customer-ava").attr("src",data.url);
					$("#username").html(data.username);
					$("#fullname").html(data.fullname);
					$("#email").html(data.email);
					$("#phone").html(data.phone);
					$("#address").html(data.address);
					$("#customerWrap").slideDown(300);	
				}
			});
    		});
    		$("#btn_remove").click(function(e){
    			e.preventDefault();
    			
    			$.ajax({
    				type:'GET',
    				url:'user',
    				data:"user_id="+d+"&action=remove",
    				success:function(data){

    					tag.slideUp("500", function() { $(this).remove(); } );
    					$("#customerWrap").slideUp(500);
    					console.log(data);
    				}
    			});
    		});
    		$("#btn_block").click(function(e){
    			e.preventDefault();
    			var userstatus = $("#btn_block").attr("data-user-status");
    			if(userstatus == "unblocked"){
	    			$.ajax({
	    				type:'GET',
	    				url:'user',
	    				data:"user_id="+d+"&action=block",
	    				success:function(data){
	    					$("#btn_block").attr("data-user-status","blocked");
	    					$("#btn_block").html("Bỏ chặn");
	    					console.log(data);
	    				}
	    			});
	    		}
	    		else{
	    			$.ajax({
	    				type:'GET',
	    				url:'user',
	    				data:"user_id="+d+"&action=unblock",
	    				success:function(data){
	    					$("#btn_block").attr("data-user-status","unblocked");
	    					$("#btn_block").html("Chặn");
	    					console.log(data);
	    				}
	    			});
	    		}
    		});
    		$("#btn_upgrade").click(function(e){
    			e.preventDefault();
    			$("#upgradeWrapper").fadeIn(500);
    			var userupgrade = $("#btn_upgrade").attr("data-upgrade");
	    		if(userupgrade == "upgrade"){	
	    			$.ajax({
					type:'GET',
					url:'user',
					data:"user_id="+d+"&action=open",
					success: function(data){
						$("#authority").html("Level: "+data.authority);
						$("#btn_upgrade").attr("data-upgrade","change");
						$("#btn_upgrade").html("Thay đổi");
					}
				});
	    		}
    		});
    		$(".level").click(function(e){
    			e.preventDefault;
	    			var userlevel = $( this).html();
	    			$.ajax({
					type:'GET',
					url:'user',
					data:"user_id="+d+"&action=changeAuth&authority="+userlevel,
					success: function(data){
						$("#btn_upgrade").attr("data-upgrade","upgrade");
						$("#btn_upgrade").html("Nâng cấp");
						$("#upgradeWrapper").fadeOut(500);
						location.reload();
						console.log(data);
					}
	    			});
    		});
    	});	
    </script>

@stop