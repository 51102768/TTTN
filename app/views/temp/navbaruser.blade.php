<nav class = "navbar navbar-default navbar-fixed-top" id = "navBar">
	<div class = "container-fluid" id = "nav-Bar">
		<div class = "navbar-header">
			<a class = "navbar-brand" href="#">Mỡ Shop</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class = "nav navbar-nav">
				<li><a href="#"><span class = "glyphicon glyphicon-home" id = "homeIcon"></span>Trang chủ</a></li>
				<li><a href="#">Hướng dẫn</a></li>
				<li><a href="#">Liên hệ</a></li>
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
