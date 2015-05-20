<header>
    <div class="row ">
      <div class="logo">
            <a href="{{URL::to("/")}}"><img src="img/logo.png"></a> 
            </div>
    </div>
    <div class="row">
            <div class="btn btn-group btn-group-justified">
                <a href="{{URL::to('/')}}" class = "btn btn-danger">
                  <span class = "glyphicon glyphicon-home" id = "BarIcon"></span>Trang chủ</a>
                </a>
                     <a href="{{URL::to('guide')}}" class = "btn btn-danger">
                    <span class = "glyphicon glyphicon-book" id = "BarIcon"></span>Hướng dẫn</a>
                    </a>
                      <a href="{{URL::to('contact')}}" class = "btn btn-danger">
                    <span class = "glyphicon glyphicon-phone" id = "BarIcon"></span>Liên hệ</a>
                    </a>
                <a href="{{URL::to('/')}}" class = "btn btn-danger">
                    <span class = "glyphicon glyphicon-usd" id = "BarIcon"></span>Thanh toán</a>
                    </a>
              <a href="{{URL::to('promotion')}}" class = "btn btn-danger">
                    <span class = "glyphicon glyphicon-star-empty" id = "BarIcon"></span>Khuyến mãi</a>
                    </a>
                    </div>
    </div>
</header>