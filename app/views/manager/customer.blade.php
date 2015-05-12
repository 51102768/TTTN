 @extends("manager.master")

@section("header")

@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Quản lí khách hàng</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="customer-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Khách hàng mới đăng kí
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                            @foreach($messages as $message)
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="{{$message->user->url}}" alt="User Avatar" class="img-circle img-ava" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">{{$message->user->fullname}}</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> {{$message->created_at}}
                                            </small>
                                        </div>
                                        <p>
                                            {{$message->text}}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
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