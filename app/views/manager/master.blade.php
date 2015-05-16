<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang quản lí Mỡ Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">


    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="css/manager.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header')


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/public">Mỡ Shop</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach($messages as $message)
                        <li>
                            <a>
                                <div>
                                    <strong>{{$message->user->fullname}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{$message->user->created_at}}</em>
                                    </span>
                                </div>
                                <div>{{substr($message->text,0,10)."..."}}</div>
                                </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach
                        <li>
                            <a class="text-center" href="message">
                                <strong>Đọc toàn bộ</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <i class="fa fa-shopping-cart fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                                <div style="margin: 5px;">
                                    <strong>Bạn có</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{$order_num}} đơn hàng</em>
                                    </span>
                                </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="order">
                                <strong>Xem chi tiết</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="manager"><i class="fa fa-dashboard fa-fw"></i> Trang chính</a>
                        </li>
                        <li>
                            <a href="message"><i class="fa fa-envelope-o fa-fw"></i> Tin nhắn</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-user fa-fw"></i> Quản lí người dùng<span class="fa arrow"></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="customer">Quản lí khách hàng</a>
                                </li>
                                <li>
                                    <a href="customer-statistics">Thống kê người dùng</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bars fa-fw"></i> Quản lí sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="product">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="product_statistics">Thống kê sản phẩm</a>
                                </li>
                                <li>
                                    <a href="order">Đơn hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Quản lí trang</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @yield("script")

</body>

</html>
