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
            <li><a data-toggle="modal" role = "button" class="btn btn-default"  data-target="#registerModal">
            	<span class="glyphicon glyphicon-plus"></span> Đăng kí
            	</a>
            </li>
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
				<h3 class="modal-title">Login</h3>
			</div>
			<div class = "modal-body">
				<div class="form-group">
				  <label for="usr">Username:</label>
				  <input type="text" class="form-control" id="loginUser">
				</div>
				<div class="form-group">
				  <label for="usr">Password:</label>
				  <input type="text" class="form-control" id="loginPassword">
				</div>
			</div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-default" id="loginSubmit">Sign In</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<div id = "registerModal" class = "modal fade" tabindex="-1" data-width="650" aria-hidden="true">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Register</h3>
			</div>
			<div class = "modal-body">
				<div class="form-group">
				  <label for="usr">Username:</label>
				  <input type="text" class="form-control" id="regUser">
				</div>
				<div class="form-group">
				  <label for="usr">Password:</label>
				  <input type="text" class="form-control" id="regPassword">
				</div>
				<div class="form-group">
				  <label for="usr">Retype Password:</label>
				  <input type="text" class="form-control" id="regRePassword">
				</div>
				<div class="form-group">
				  <label for="usr">Full name:</label>
				  <input type="text" class="form-control" id="regfullname">
				</div>
				<div class="form-group">
				  <label for="usr">Email:</label>
				  <input type="text" class="form-control" id="regEmail">
				</div>
			</div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-default" id="loginSubmit">Sign Up</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
