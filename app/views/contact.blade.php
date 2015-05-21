@extends('master')
@section('header')
	<link
	type="text/css"
	rel="stylesheet"
	href="{{ asset("css/content.css") }}"
	/>
@stop
@section('content')
	@include("temp.carousel")

	<div class="row">
		@include("temp.sidebar")

		<div class="col-md-9 right-wrapper">
			<div class="row cold-md-4">
				<div class="title">
					<h3>Liên hệ</h3>				
				</div>				
			</div>
			<div class="row cold-md-4">
					<form>
						<div class="form-group">
							<label for="name">Họ tên:</label>
							<input type="text" class="form-control" id="name" placeholder="Nhập Họ tên">							
							<label for="phone">Điện thoại:</label>
							<input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
							<label for="email">Địa chỉ Email:</label>
							<input type="text" class="form-control" id="email" placeholder="Nhập địa chỉ Email">							
							<label for="message">Nội dung:</label>
							<textarea class="form-control" rows="3"></textarea>
						</div>
						<button type="Submit" class="btn btn-default">Gửi</button>

					</form>
				</div>

			
		</div>
	</div>	
	@include('temp.footer')
@stop