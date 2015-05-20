<div class="col-md-3">				
			<div class="row category">
				<div id='cssmenu'>
				<ul>
					@foreach($categories as $category)
						<li class="active has-sub"><a href="#">{{$category->brand}}</a>
							<ul>
							@foreach($category->types as $type)
								<li><a href="brand?category_id={{$category->id}}&type_id={{$type->id}}"><span>{{$type->name}}</span></a></li>
							@endforeach
							<li><a href="brand?category_id={{$category->id}}"><span>Xem tất cả</span></a></li>
							</ul>
						</li>
					@endforeach
				</ul>
				</div>
			</div>			
		</div>