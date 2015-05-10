@extends('master')

@section('header')
	<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/profile.css") }}"
	/>


@stop

@section('content')
<script>
	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});

	$(document).ready( function() {
	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
	document.getElementById("upload").value = label;
	});
	});
</script>
<div class="row ">
	<div class="col-md-4 col-centered text-center">
		<div class="row">
			@if(is_null(Auth::user()->url))
				<img src="img\avatar\user.jpg" class="img-thumbnail" alt="User">
			@else
				<img src="{{Auth::user()->url}}" class="img-thumbnail" alt="User">
			@endif
		</div>
	</div>
	<div class="col-md-8 well">
		<h4>Thông tin người dùng</h4>
		<hr>
		<div class="row">
			<table class="table table-hover table-striped">
				<tr>
					<td>Tên đăng nhập</td>
					<td>{{Auth::user()->username}}</td>
				</tr>
				<tr>
					<td>Tên đầy đủ</td>
					<td>{{Auth::user()->fullname}}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{Auth::user()->email}}</td>
				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td>{{Auth::user()->phone}}</td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>{{Auth::user()->address}}</td>
				</tr>
			</table>
		</div>
		<div class="row">
			<p><a href="editprofile" class = "btn btn-success">Chỉnh sửa</a></p>
			<p><a href="" class = "btn btn-success" data-toggle="modal" data-target="#uploadModal">Thay đổi ảnh đại diện</a></p>
			<div id="uploadModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					{{ Form::open(array('url'=>'image-submit','files'=>true)) }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thay đổi ảnh đại diện</h4>
					</div>
					<div class="modal-body">	
						<div class="input-group">
							<div class="col-md-12">
							<a class="btn btn-primary btn-file">
								Chọn ảnh 
							<input type="file" name = "image">
							</a>
							<input type="text" id = "upload" class = "form-control">
							</div>	
						</div>
					</div>
					<div class="modal-footer">
						{{ Form::submit('Hoàn tất',array('class'=>'btn btn-success'))}}
						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					</div>
					{{ Form::close()}}
				</div>

				</div>
			</div>
			
		</div>	 
		</div>
	</div>
</div>



@stop