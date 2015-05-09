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
		<img src="img/user.jpg" class="img-thumbnail" alt="User"> 
	</div>
	<div class="col-md-8 well">
		<h4>Thông tin người dùng</h4>
		<hr>
		<div class="row">
			<table class="table table-hover">
				<tr class="active">
					<td>Tên đăng nhập</td>
					<td>{{Auth::user()->username}}</td>
				</tr>
				<tr class="success">
					<td>Tên đầy đủ</td>
					<td>{{Auth::user()->fullname}}</td>
				</tr>
				<tr class="info">
					<td>Email</td>
					<td>{{Auth::user()->email}}</td>
				</tr>
				<tr class="warning">
					<td>Số điện thoại</td>
					<td>{{Auth::user()->phone}}</td>
				</tr>
				<tr class="danger">
					<td>Địa chỉ</td>
					<td>{{Auth::user()->address}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>

@stop