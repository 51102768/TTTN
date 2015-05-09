<nav class = "navbar navbar-default navbar-fixed-top" id = "navBar">
	<div class = "container-fluid" id = "nav-Bar">
		<div class = "navbar-header">
			<a class = "navbar-brand" href="#">Mỡ Shop</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class = "nav navbar-nav">
				<li class = "active"><a href="#"><span class = "glyphicon glyphicon-home" id = "homeIcon"></span>Trang chủ</a></li>
				<li><a href="#">Hướng dẫn</a></li>
				<li><a href="#">Liên hệ</a></li>
		</ul>
		<ul class = "nav navbar-nav navbar-right">
			<li>
				{{ucwords(Auth::user()->fullname)}}
			</li>
			<li>
				<a href="user">Thông tin</a>
			</li>
			<li>
				<a href="logout">Đăng xuất</a>
			</li>
		<li><a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
		</ul>
		</div>
	</div>
</nav>
