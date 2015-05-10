<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Mỡ shop</title>
		<script
		type="text/javascript"
		src="{{ asset("js/jquery-1.11.2.min.js") }}"
		></script>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("bootstrap/dist/css/bootstrap.css") }}"
		/>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("bootstrap/dist/css/bootstrap.min.css") }}"
		/>
		<script
		type="text/javascript"
		src="{{ asset("bootstrap/dist/js/bootstrap.js") }}"
		></script>
		<link
		type="text/css"
		rel="stylesheet"
		href="{{ asset("css/manager.css") }}"
		/>
	</head>
	<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="nav-side-menu">
				    <div class="brand">Mỡ shop</div>
				  
				        <div class="menu-list">
				  
				            <ul id="menu-content" class="menu-content collapse out">
				                <li>
				                  <a href="/">
				                  <i class="glyphicon glyphicon-home"></i> Trang chủ
				                  </a>
				                </li>

				                <li  data-toggle="collapse" data-target="#products" class="collapsed">
				                  <a><i class="glyphicon glyphicon-user"></i> Quản lí người dùng   <span class="caret"></span></a>
				                </li>
				                <ul class="sub-menu collapse" id="products">
				                    <li ><a href="#">CSS3 Animation</a></li>
				                    <li><a href="#">General</a></li>
				                    <li><a href="#">Buttons</a></li>
				                    <li><a href="#">Tabs Accordions</a></li>
				                    <li><a href="#">Typography</a></li>
				                    <li><a href="#">FontAwesome</a></li>
				                    <li><a href="#">Slider</a></li>
				                    <li><a href="#">Panels</a></li>
				                    <li><a href="#">Widgets</a></li>
				                    <li><a href="#">Bootstrap Model</a></li>
				                </ul>


				                <li data-toggle="collapse" data-target="#service" class="collapsed">
				                  <a><i class="glyphicon glyphicon-gift"></i> Quản lí sản phẩm   <span class="caret"></span></a>
				                </li>  
				                <ul class="sub-menu collapse" id="service">
				                  <li>New Service 1</li>
				                  <li>New Service 2</li>
				                  <li>New Service 3</li>
				                </ul>


				                <li data-toggle="collapse" data-target="#new" class="collapsed">
				                  <a><i class="glyphicon glyphicon-shopping-cart"></i> Quản lí đơn hàng   <span class="caret"></span></a>
				                </li>
				                <ul class="sub-menu collapse" id="new">
				                  <li>New New 1</li>
				                  <li>New New 2</li>
				                  <li>New New 3</li>
				                </ul>
				                </li>
				            </ul>
				     </div>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>