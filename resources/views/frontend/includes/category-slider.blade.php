<div class="menu-list-group">
	<div class="container">
		<div class="scrolling-menu">
			<li><a href="">all</a></li>
			@foreach(Engezli::get_categories() as $category)
			<li class="active"><a href="{{$category->cat_url}}">{{$category->cat_title}}</a></li>
			@endforeach
		</div>
	</div>
</div>