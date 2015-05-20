<nav class = "navbar navbar-default navbar-fixed-top" id = "navBar">
	<div class = "navbar-header">
		<a class = "navbar-brand" href="{{URL::to('/')}}">Mỡ Shop</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class = "nav navbar-nav">
			<li><a href="{{URL::to('/')}}"><span class = "glyphicon glyphicon-home" id = "homeIcon"></span>Trang chủ</a></li>
			<li><a href="#">Hướng dẫn</a></li>
			<li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
			<li>	{{Form::open(array("url"=>"search"))}}
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
	<li><a href="#"  role = "button" data-toggle="modal" data-target = "#loginModal">
		<span class="glyphicon glyphicon-user"></span> Đăng nhập
		</a>
	</li>
	<li><a href="register" role = "button">
		<span class="glyphicon glyphicon-plus"></span> Đăng kí
		</a>
	</li>
	<li>
		<a href="" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			Bạn đã đặt {{Cart::count()}} sản phẩm
			<span class="glyphicon glyphicon-shopping-cart"></span>
		</a>
		<ul class="dropdown-menu" role="menu">
		@foreach(Cart::content() as $row)
			<li style = "padding: 10px 10px 10px 10px"><span>{{$row->name}}</span><span style = "float: right">{{$row->qty}} 
			<a  id = "remove_cart" data-cart = "{{$row->rowid}}"><div class= "glyphicon glyphicon-remove-circle"></div></a>
			</span></li>
		@endforeach
		 <li role="presentation" class="divider"></li>
		 <li><a>Tổng số tiền: {{Cart::total()}} VNĐ</a></li>
		 <li><a href="payment">Thanh toán</a></li>
		</ul>

	</li>
	</ul>
	</div>
</nav>

<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		{{ Form::open(array('url'=>'login','files'=>true,"method"=>"post","id"=>"loginForm")) }}
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Đăng nhập</h4>
		</div>
		<div class="modal-body">	
			 @if  (Session::has("failed")) <p><div class="alert alert-danger" role="alert">{{ Session::get("failed") }}</div></p>@endif
			{{Form::open(array('url' => 'login'))}}
			<div class="form-group">
				{{Form::label('username','Tên đăng nhập:')}}
				{{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Username','data-validation'=>'required','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin '))}}
				@if  ($errors->has('username')) <p><div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div></p>@endif
			</div>
			<div class="form-group">
				{{Form::label('password','Mật khẩu:')}}
				{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password','data-validation'=>'required','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin '))}}
				@if ($errors->has('password')) <p><div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div> </p>@endif
			</div>
			{{Form::submit('Đăng nhập',array('class'=>'btn btn-success'))}}
		</div>
		<div class="modal-footer">
			Bạn chưa có tài khoản?
			<a href="register" class = "btn btn-primary">Đăng kí</a>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>

		</div>
		{{ Form::close()}}
	</div>

	</div>
</div>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
 <script type="text/javascript" src="js\form-validator\jquery.form-validator.min.js"></script>

    <script>
    	$.validate({
		form : '#loginForm'
	});
    	$('.modal').on('shown.bs.modal', function (e) {
			$('.carousel').carousel('pause');
	});
    	
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