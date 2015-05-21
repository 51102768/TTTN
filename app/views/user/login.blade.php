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
			@if  (Session::has("failed")) 
			<p><div class="alert alert-danger" role="alert">{{ Session::get("failed") }}</div></p>
			@endif
			{{Form::open(array('url' => 'login',"id"=>"login"))}}
			<div class="form-group">
				{{Form::label('username','Tên đăng nhập:')}}
				{{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Username','data-validation'=>'required','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin '))}}
				@if  ($errors->has('username')) 
				<p><div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div></p>
				@endif
			</div>
			<div class="form-group">
				{{Form::label('password','Mật khẩu:')}}
				{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password','data-validation'=>'required','data-validation-error-msg-required'=>'Vui lòng điền đầy đủ thông tin '))}}
				@if ($errors->has('password'))
				 <p><div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div> </p>
				 @endif
			</div>
			{{Form::submit('Đăng nhập',array('class'=>'btn btn-success'))}}
			<a href="register" class = "btn btn-primary">Đăng kí</a>
			{{Form::close()}}
		</div>
	</div>
</div>


	<script>
		$.validate({
		form : '#login'
		});
	</script>
@stop
