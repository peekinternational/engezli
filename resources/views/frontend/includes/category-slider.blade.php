<!-- <div class="menu-list-group">
	<div class="container">
		<div class="scrolling-menu">
			<li><a href="{{url('services/all')}}">{{ __('home.All')}}</a></li>
			@foreach(Engezli::get_categories() as $category)
			<li class="active"><a href="{{url('services/'.$category->cat_url)}}">{{$category->cat_title}}</a></li>
			@endforeach
		</div>
	</div>
</div> -->
<div class="mega-menu-container">
	<div class="container">
		<div class="custom-mega-menu scrolling-menu">
			<ul class="main-natigation-lists">
				@foreach(Engezli::get_categories() as $category)
				<li class="top-level-link">
					<a href="{{url('services/'.$category->cat_url)}}" class="nav-link">{{$category->cat_title}}</a>
					@if(Engezli::check_child($category->id) == '1')
					<ul class="menu-lists column-count-four">
						@foreach(Engezli::get_subcategories($category->id) as $subcat)
						<ul class="sub-menu-lists">
							<li><a href="{{url('services/'.$subcat->cat_url)}}">{{$subcat->cat_title}}</a> </li>
						</ul>
						@endforeach
					</ul>
					@endif
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
