@extends('master')

@section('header')
	<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/login.css") }}"
	/>
@stop

@section('content')

<div class="row row-centered" id = "loginwrapper">
	<div class="col-md-2"></div>
	<div class="col-md-8 col-centered">
		<div class="well centered">
			<legend>Đăng nhập</legend>
			{{Form::open(array('url' => 'login'))}}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss = "alert">&times;</a>
				{{implode('', $errors->all('<li class = "error">:message</li>'))}}
			</div>
			@endif
			<div class="form-group">
				{{Form::label('username','Tên đăng nhập:')}}
				{{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Username'))}}
			</div>
			<div class="form-group">
				{{Form::label('password','Mật khẩu:')}}
				{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password'))}}
			</div>
			{{Form::submit('Đăng nhập',array('class'=>'btn btn-success'))}}
			<a href="register" class = "btn btn-primary">Đăng kí</a>
			{{Form::close()}}
		</div>
	</div>
</div>
@if(Session::has('message'))
	<script>
		alert('{{Session::get("message");}}');
	</script>
@endif

@stop