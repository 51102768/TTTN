@extends("manager.master")

@section("header")
<link href="css/customer.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bowlby+One+SC" />
@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Thống kê trang</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Thống kê tổng quát
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body text-center">
                            <div class="col-lg-12">
                                    <div class="row">
                                    <i class="fa fa-eye fa-5x"></i>
                                    </div>
                                    <div class="row">
                                        <h4>Có {{$num_view}} lượt xem</h4>
                                    </div>

                                    <div class="row" style="margin-top: 10px">
                                    <i class="fa fa-male fa-5x"></i>
                                    </div>
                                    <div class="row">
                                        <h4>Có {{$num_login}} lượt đăng nhập</h4>
                                    </div>

                                    <div class="row" style="margin-top: 10px">
                                    <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="row">
                                        <h4>Có {{$num_users_new}} lượt đăng kí gần đây</h4>
                                    </div>

                               </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
	</div>
	<div class="col-lg-6">
		<div class="customer-panel panel panel-yellow">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i>
                            Người dùng mới đăng nhập
                        </div>	
                        <div class="panel-body customer">
                        <div class="list-group list ">
                        @foreach($users as $user)
		    <a data-user-id="{{$user->id}}" class="list-group-item link">
                                    <span class = "custom-img pull-left">
                                    <img src="{{$user->url}}" alt="User Avatar" class="img-thumbnail img-custom" />
                                    </span>
                                    <div>
                                    <strong class="primary-font">{{$user->email}}</strong>
                                    <p>
                                    <medium>{{ucwords($user->authority)}}</medium>
                                    <small class = "pull-right">{{$user->login}}</small>
                                     </p>
                                     </div>
		    </a>
		 @endforeach
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

@stop