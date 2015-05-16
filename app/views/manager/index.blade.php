 @extends("manager.master")

@section("header")
<link href="css/customer.css" rel="stylesheet">

<link rel="stylesheet" type="tẽt/css" href="//fonts.googleapis.com/css?family=Bowlby+One+SC" />
@stop

 @section("content")

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Trang chính</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$num_mess}}</div>
                                    <div>Tin nhắn mới!</div>
                                </div>
                            </div>
                        </div>
                        <a href="message">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$order_num}}</div>
                                    <div>Đơn hàng!</div>
                                </div>
                            </div>
                        </div>
                        <a href="order">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$count_user_new}}</div>
                                    <div>Người dùng mới!</div>
                                </div>
                            </div>
                        </div>
                        <a href="customer-statistics">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                   <div class="customer-panel panel panel-red text-center">
                   	<a href="page">
                   		<div class="row">
                   		<i class="fa fa-eye fa-5x"></i>
                   		</div>
                   		<div class="row">
                   			<h4>Có {{$num_view}} lượt xem</h4>
                   		</div>
                   	</a>
                   </div>

                   <div class="customer-panel panel panel-red text-center">
                   	<a href="page">
                   		<div class="row" style="margin-top: 10px">
                   		<i class="fa fa-male fa-5x"></i>
                   		</div>
                   		<div class="row">
                   			<h4>Có {{$num_view}} lượt đăng nhập</h4>
                   		</div>
                   	</a>
                   </div>

                   </div>
                    <!-- /.panel -->
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
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
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
@stop

@section("script")

<!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>

    <!-- Custom Thêm JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

@stop