<nav class = "navbar navbar-default navbar-fixed-top" id = "navBar">
	<div class = "container-fluid" id = "nav-Bar">
		<div class = "navbar-header">
			<a class = "navbar-brand" href="{{URL::to('/')}}">Mỡ Shop</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class = "nav navbar-nav">
				<li><a href="{{URL::to('/')}}"><span class = "glyphicon glyphicon-home" id = "homeIcon"></span>Trang chủ</a></li>
				<li><a href="intruction">Hướng dẫn</a></li>
				<li><a href="contact">Liên hệ</a></li>
				<li>
					<div class="input-group search">
					  <span class="input-group-addon" id="basic-addon1"><i class ="glyphicon glyphicon-search"></i></span>
					  <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-describedby="basic-addon1">
					  <span class="input-group-btn">
        <a class="btn btn-default" type="button">Go!</a>
      </span>
					</div>
				</li>
		</ul>
		<ul class = "nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-expanded="true">
					{{ucwords(Auth::user()->fullname)}}
					<span class="caret"></span>
					</a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownUser">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="profile">Thông tin người dùng</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Đơn hàng</a></li>
					@if(Auth::user()->authority == "admin")
					<li role="presentation">
						<a  role="menuitem" tabindex="-1"  href="manager">Trang quản lí</a>
					</li>
					@endif
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="logout">Đăng xuất</a></li>
				</ul>
				</li>
			<li>
				<a href="logout">Đăng xuất</a>
			</li>
		<li><a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
		</ul>
		</div>
	</div>
</nav>
