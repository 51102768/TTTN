@extends("manager.master")

@section("header")
<link href="css/customer.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bowlby+One+SC" />
@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Thống kê người dùng</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Thống kê tổng quát
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Tin nhắn
                                    <span class="pull-right text-muted small"><em>{{$count_messages}} tin nhắn</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Người dùng
                                    <span class="pull-right text-muted small"><em>{{$count_user}} người</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Người dùng mới
                                    <span class="pull-right text-muted small"><em>{{$count_user_new}} người</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Người dùng bình thường
                                    <span class="pull-right text-muted small"><em>{{$count_user_nomal}} người</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Người dùng VIP
                                    <span class="pull-right text-muted small"><em>{{$count_user_vip}} người</em>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
	</div>
	<div class="col-lg-6">
		<div class="customer-panel panel panel-red">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i>
                            Người dùng mới
                        </div>	
                        <div class="panel-body customer">
                        <div class="list-group list ">
                        @foreach($user_new as $user)
		    <a href="#" data-user-id="{{$user->id}}" class="list-group-item link">
                                    <span class = "custom-img pull-left">
                                    <img src="{{$user->url}}" alt="User Avatar" class="img-thumbnail img-custom" />
                                    </span>
                                    <div>
                                    <strong class="primary-font">{{$user->fullname}}</strong>
                                            <p><medium>
                                                 {{ucwords($user->authority)}}
                                     </medium></p>
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