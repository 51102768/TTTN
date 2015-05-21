 @extends("manager.master")

@section("header")

@stop

 @section("content")
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tin nhắn</h1>
	</div>
</div>

<div class="row">
                <div class="col-lg-12">

                    <!-- /.panel -->
                    <div class="chat-panel panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-envelope fa-fw"></i>
                            Tin nhắn
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
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                        {{Form::open(array('url' => 'message'))}}
                            <div class="input-group">
                                {{ Form::text('message','',array('id'=>'btn-input','class'=>'form-control input-sm','placeholder'=>'Nhập kí tự ở đây... '))}}
                                <span class="input-group-btn">
                                    {{Form::submit('Gửi',array('class'=>'btn btn-warning btn-sm','id'=>'btn-chat'))}}
                                    {{Form::close()}}
                                </span>
                                 <span class="input-group-btn">
                                 	{{Form::open(array('url'=>'message_checked'))}}
                                    {{Form::submit('Đã xem',array('class'=>'btn btn-success btn-sm','id'=>'btn-chat'))}}
                                    {{Form::close()}}
                                </span>
                            </div>
                             
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                </div>

                <div class="col-lg-12">

                    <!-- /.panel -->
                    <div class="chat-panel panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-envelope fa-fw"></i>
                            Tin nhắn khách hàng
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                            @foreach($customer_messages as $message)
                                <li class="left clearfix">
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">{{$message->name}} - {{$message->email}} - {{$message->phone}}</strong>
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
                        <!-- /.panel-body -->
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