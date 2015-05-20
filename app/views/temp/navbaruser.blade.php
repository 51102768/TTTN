<nav class = "navbar navbar-default navbar-fixed-top" id = "navBar">
	<div class = "container-fluid" id = "nav-Bar">
		<div class = "navbar-header">
			<a class = "navbar-brand" href="{{URL::to('/')}}">Mỡ Shop</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class = "nav navbar-nav">
				<li><a href="{{URL::to('/')}}"><span class = "glyphicon glyphicon-home" id = "homeIcon"></span>Trang chủ</a></li>
				<li><a href="guide">Hướng dẫn</a></li>
				<li><a href="contact">Liên hệ</a></li>
				<li>
					{{Form::open(array("url"=>"search"))}}
					<div class="input-group search">
					  <span class="input-group-addon" id="basic-addon1"><i class ="glyphicon glyphicon-search"></i></span>
					  <input type="text" class="form-control" name = "item" placeholder="Tìm kiếm...">
					  <span class="input-group-btn">
	        				 {{Form::submit('Tìm',array('class'=>'btn btn-default'))}}
	        				 </span>
					</div>
					{{Form::close()}}
				</li>
		</ul>
		<ul class = "nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-expanded="true">
					{{ucwords(Auth::user()->fullname)}}
					<span class="caret"></span>
					</a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownUser">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="profile">Thông tin người dùng</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Đơn hàng</a></li>
					@if(Auth::user()->authority == "admin")
					<li role="presentation">
						<a  role="menuitem" tabindex="-1"  href="manager">Trang quản lí</a>
					</li>
					@endif
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="logout">Đăng xuất</a></li>
				</ul>
				</li>
			<li>
				<a href="logout">Đăng xuất</a>
			</li>
			<li>
			<a href="" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			Bạn đã đặt {{Cart::count()}} sản phẩm
			<span class="glyphicon glyphicon-shopping-cart"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
			@foreach(Cart::content() as $row)
				<li style = "padding: 10px 10px 10px 10px"><span>{{$row->name}}</span><span style = "float: right">{{$row->qty}} <a id = "remove_cart" data-cart = "{{$row->rowid}}"><div class= "glyphicon glyphicon-remove-circle"></div></a>
				</span></li>
			@endforeach
			 <li role="presentation" class="divider"></li>
			 <li><a>Tổng số tiền: {{Cart::total()}} VNĐ</a></li>
			 <li><a href="payment">Thanh toán</a></li>
			</ul>
		</li>
		</ul>
		</div>
	</div>
</nav>

<script>
	$("#remove_cart").click(function(){
		var d = $(this).attr("data-cart");
		$.ajax({
			type:'POST',
			url:'remove_cart',
			data:"rowid="+d,
			success:function(data){
				console.log(data);
				location.reload();
			}
		});
	});
</script>
