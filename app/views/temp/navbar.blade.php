
<nav class = "navbar navbar-default navbar-fixed-top" id = "navBar">
	<div class = "navbar-header">
		<a class = "navbar-brand" href="{{URL::to('/')}}">Mỡ Shop</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class = "nav navbar-nav">
			<li><a href="{{URL::to('/')}}"><span class = "glyphicon glyphicon-home" id = "homeIcon"></span>Trang chủ</a></li>
			<li><a href="#">Hướng dẫn</a></li>
			<li><a href="#">Liên hệ</a></li>
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
	<li><a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
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
    </script>