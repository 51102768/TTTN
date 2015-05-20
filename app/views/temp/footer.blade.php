<style type="text/css">
  footer{
    background-color:rgba(90, 83, 83,0.6);
    margin-top: 40px;
    padding-top: 30px;
    color :rgb(179, 85, 85);
  }

  .foot ul{
    list-style-type: none;
  }

  .foot a{
   color: rgb(193, 145, 145);
  }


</style>
<footer class = "foot">
 <div class="container-fluid">
     
       <div class="col-lg-6">
            <div class="cuadro_intro_hover " style="background-color:#cccccc;">
            <p style="text-align:center; margin-top:20px;">
              <img src="img/logo.png" class="img-responsive" alt="">
            </p>
          </div>
        
      </div>
            

            <div class="col-lg-3 col-md-6" style = "list-type-style: none">
      <h3>Danh mục</h3>
                <ul >
                @foreach($categories as $category)
        <li><a href="brand?category_id={{$category->id}}">{{$category->brand}}</a></li>
        @endforeach
        </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3>Liên hệ</h3>
        <p>Có thắc mắc xin liên hệ!</p>
        <p><a href="contact" title="Contact me!"><i class="fa fa-envelope"></i> Liên hệ</a></p>
      
      
<a href="" id="gh" target="_blank" title="Twitter"><span class="fa-stack fa-lg">
  <i class="fa fa-square-o fa-stack-2x"></i>
  <i class="fa fa-twitter fa-stack-1x"></i>
</span>
Twitter</a>
<a href=""  target="_blank" title="GitHub"><span class="fa-stack fa-lg">
  <i class="fa fa-square-o fa-stack-2x"></i>
  <i class="fa fa-github fa-stack-1x"></i>
</span>
GitHub</a>

    


    
      
      </div>
      <br/>
<div class="g-plusone" data-annotation="inline" data-width="300" data-href=""></div>
      <br/>
      
        <hr>
        <div class="col-md-12">
                  <p>Copyright © Your Website | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>
          </div>
          
          </div>
        </footer>