@extends('frontend.layouts.app')
@section('title', 'Categories  ')
@section('styling')
@endsection
@section('content')
<?php $cat_url = Request::segment(2); ?>
<!-- Category Slider -->
@include('frontend.includes.category-slider')
<div class="menu-category-container">
	<div class="container">
		<div class="outer-content">
			<div class="headers">
				<h2>{{$mainCategories->cat_title}}</h2>
				<p>
					Have a way with words. Get copy, translation & editorial work from
					freelancers
				</p>
			</div>

			<div class="inner-content">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="category-lists-container">
							<ul>
								@foreach(Engezli::get_categories() as $category)
								<li class="@if($category->cat_url == $cat_url) active @endif">
									<a href="{{url('categories/'.$category->cat_url)}}">{{$category->cat_title}}</a>
								</li>
								@endforeach
								<!-- <li><a href="">web development</a></li>
								<li><a href="">website design</a></li>
								<li><a href="">digital marketing</a></li>
								<li><a href="">training and consulting</a></li>
								<li><a href="">video and montage</a></li>
								<li><a href="">voice over</a></li>
								<li><a href="">free Business</a></li>
								<li><a href="">digital marketing</a></li>
								<li><a href="">training and consulting</a></li>
								<li><a href="">video and montage</a></li>
								<li><a href="">voice over</a></li>
								<li><a href="">free Business</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="category-thumbnail-lists">
							<div class="row">
								@foreach($subCategories as $subcategory)
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-box">
									<div class="categories-card">
										<a href="{{url('services/'.$mainCategories->cat_url.'/'.$subcategory->cat_url)}}">
											<span class="category-image">
												@if($subcategory->cat_image != '')
												<img alt="" class="card-img-top" src="{{asset('images/cat_images/'.$subcategory->cat_image)}}"
												/>
												@else
												<img
													alt=""
													class="card-img-top"
													src="{{asset('images/default-img.png')}}"
												/>
												@endif
											</span>
											<span class="title">
												<h6>{{$subcategory->cat_title}}</h6>
											</span>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
@endsection
