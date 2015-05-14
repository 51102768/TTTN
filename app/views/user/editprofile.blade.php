@extends('master')

@section('header')
	<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/profile.css") }}"
	/>
@stop

@section('content')

<div class="row ">
	<div class="col-md-4 col-centered text-center">
		<div class="row">
			@if(is_null(Auth::user()->url))
				<img src="img\avatar\user.jpg" class="img-thumbnail" alt="User">
			@else
				<img src="{{Auth::user()->url}}" class="img-thumbnail" alt="User">
			@endif
		</div>
	<div class="col-md-8 well">
		<h4>Thông tin người dùng</h4>
		<hr>
		<p style = "color:red">Bỏ trống để xóa thông tin</p>
		{{Form::open(array('url' => 'editprofile'))}}
		<div class="row">
			<table class="table table-hover table-striped">
				<tr>
					<td>Họ và tên</td>
					<td>
					{{ Form::text('fullname','',array('class'=>'form-control','placeholder'=>Auth::user()->fullname))}}
                 				<p>@if  ($errors->has('fullname')) <div class="alert alert-danger" role="alert">{{ $errors->first('fullname') }}</div>@endif</p>
                 				</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{Auth::user()->email}}</td>
				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td>
					{{ Form::text('phone','',array('class'=>'form-control','value'=>Auth::user()->phone))}}
                 				<p>@if  ($errors->has('phone')) <div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>@endif</p>
                 				</td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>
					{{ Form::text('address','',array('class'=>'form-control','value'=>Auth::user()->address))}}
                 				<p>@if  ($errors->has('address')) <div class="alert alert-danger" role="alert">{{ $errors->first('address') }}</div>@endif</p>
                 				</td>
				</tr>
			</table>
		</div>
		<div class="row">
			{{Form::submit('Hoàn tất',array('class'=>'btn btn-success'))}}
		            <a href="profile" class = "btn btn-primary">Hủy</a>
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