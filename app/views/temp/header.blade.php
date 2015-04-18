<nav class = "navbar navbar-default navbar-fixed-top" id = "navBar">
      <div class = "container-fluid">
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
            <li><a data-toggle="modal" role = "button" class="btn btn-default"  data-target="#loginModal">
            	<span class="glyphicon glyphicon-user"></span> Đăng nhập
            	</a>
            </li>
            <li><a href=""><span class="glyphicon glyphicon-plus"></span> Đăng kí</a></li>
            <li><a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
          </ul>
        </div>
      </div	>
    </nav>
<div id = "loginModal" class = "modal fade" tabindex="-1" data-width="760" aria-hidden="true">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class = "modal-body">
				<div class="row-fluid">
					 <h4>Username:</h4>
					 <p><input type = "text" id = "loginUser" placeholder="Enter Username"></p>
				</div>
				<div class="row-fluid">
					 <h4>Password:</h4>
					 <p><input type = "text" id = "loginPass" placeholder="Enter Password"></p>
				</div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
