@extends('frontend.layouts.app')
@section('title', 'Home  ')
@section('styling')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="banner">
	<div class="container">
		<div class="outer-content">
			<div class="banner-content">
				<h1 class="title"> {{ __('home.Home Banner Title') }}
				</h1>

				<form action="{{url('/search')}}" method="get" class="search-box">
					<i class="fa fa-search"></i>
					<input type="text" name="service_title" class="form-control" placeholder="{{ __('home.Find services')}}"  value="{{ old('titlesearch') }}" />
					<button class="btn" type="submit">{{ __('home.search')}}</button>
				</form>

				<div class="suggestions">
					<ul>
						<li class=""><a href="">logo design</a></li>
						<li class=""><a href="">video editing</a></li>
						<li class=""><a href="">translation</a></li>
						<li class=""><a href="">voice over</a></li>
						<li class=""><a href="">development</a></li>
					</ul>
				</div>
			</div>

			<div class="image-container">
				<img alt="" src="{{asset('images/bg-illustration.svg')}}" />
			</div>
		</div>
	</div>
</div>
<div class="easy-to-do-it">
	<div class="container">
		<div class="outer-content">
			<div class="headers">
				<h2>{{ __('home.Home Section two title')}}</h2>
				<p>{{ __('home.Follow those step')}}</p>
			</div>

			<div class="inner-content">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="outer-box">
							<div class="img-container">
								<img alt="" src="{{asset('images/sec2 (1).svg')}}" />
							</div>

							<div class="title-and-desc">
								<h4>{{ __('home.Search for a service')}}</h4>
								<p>
									{{ __('home.lorem home')}}
								</p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="outer-box">
							<div class="img-container">
								<img alt="" src="{{asset('images/sec2 (2).svg')}}" />
							</div>

							<div class="title-and-desc">
								<h4>{{ __('home.Choose an expert')}}</h4>
								<p>
									{{ __('home.lorem home')}}
								</p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="outer-box">
							<div class="img-container">
								<img alt="" src="{{asset('images/sec2 (3).svg')}}" />
							</div>

							<div class="title-and-desc">
								<h4>{{ __('home.Get your work done')}}</h4>
								<p>
									{{ __('home.lorem home')}}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="all-categories">
	<div class="container">
		<div class="outer-content">
			<div class="headers">
				<h2>{{ __('home.Categories You Can Search For')}}</h2>
				<p>{{ __('home.All categories are currently available')}}</p>
			</div>

			<div class="row">
				@foreach($categories as $cat)
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<a href="{{url('categories/'.$cat->cat_url)}}" class="category-box">
						<div class="img-container">
							<img src="{{asset('images/cat_images/'.$cat->cat_image)}}" alt="" />
						</div>
						<h4>{{ __('home.'.$cat->cat_title)}}</h4>
						<div class="line"></div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

<div class="achievement">
	<div class="container">
		<div class="outer-content">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="outer-box">
						<div class="box">
							<div class="icon">
								<img src="{{asset('images/achievement (1).svg')}}" alt="" />
							</div>
						</div>
						<div class="box">
							<h1>70,000</h1>
							<p>{{ __('home.Employee around')}}</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="outer-box">
						<div class="box">
							<div class="icon">
								<img src="{{asset('images/achievement (2).svg')}}" alt="" />
							</div>
						</div>
						<div class="box">
							<h1>10,000</h1>
							<p>{{ __('home.Completed Job')}}</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="outer-box">
						<div class="box">
							<div class="icon">
								<img src="{{asset('images/achievement (3).svg')}}" alt="" />
							</div>
						</div>
						<div class="box">
							<h1>99%</h1>
							<p>{{ __('home.Customer satisfaction')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="top-rated-services">
	<div class="container">
		<div class="outer-content">


			<div class="inner-content">
				<div class="swiper-container top-rated-services-container">
					<div class="headers">
						<h2>{{ __('home.Top Rated Services')}}</h2>
					</div>
					<div class="swiper-wrapper">
						@foreach($services as $service)

						<div class="swiper-slide">
							<div class="card">
								<span class="gig-image">
									@if($service->service_img1 != '')
									<img
										alt=""
										class="card-img-top"
										src="{{asset('images/service_images/'.$service->service_img1)}}"
									/>
									@else
									<img
										alt=""
										class="card-img-top"
										src="{{asset('images/card (1).png')}}"
									/>
									@endif
								</span>
								<div class="card-body seller-info">
									<div class="seller-image">
										@if($service->sellerInfo->facebook_id != null || $service->sellerInfo->google_id != null)
										<img alt="" class="" src="{{$service->sellerInfo->profile_image}}" />
										@elseif($service->sellerInfo->profile_image != '')
										<img alt="" class="" src="{{asset('images/user_images/'.$service->sellerInfo->profile_image)}}" />
										@else
										<img src="{{asset('images/avatar (1).svg')}}">
										@endif
									</div>

									<div class="seller-name">
										<a href="{{url('profile/'.$service->sellerInfo->username)}}">{{$service->sellerInfo->first_name}} {{$service->sellerInfo->last_name}}</a>
										<p class="level">Level 1 Seller</p>
									</div>
									<a href="{{url('/'.$service->sellerInfo->username.'/'.$service->service_url)}}" class="gig-title">
										{{$service->service_title}}
									</a>
									<div class="content-info">
										<div class="rating-wrapper">
											<span class="gig-rating text-body-2">
												<i class="fa fa-star"></i>
												{{number_format($service->serviceRating->avg('overall_rating'),'1','.','')}}
												<span>({{count($service->serviceRating)}})</span>
											</span>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<i aria-hidden="true" class="fa fa-heart"></i>
									<div class="price">
										<a href="#">
											Starting At
											@foreach($service->packageInfo as $key => $packg)
											@if($key == 0)
												<span>${{$packg->price}} </span>
											@endif
											@endforeach
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<!-- Add Arrows -->
					<div class="swiper-btn-container">
						<div class="swiper-button-prev">
							<i class="fa fa-angle-left"></i>
						</div>
						<div class="swiper-button-next">
							<i class="fa fa-angle-right"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".top-rated-services-container", {
		slidesPerView: 1,
		spaceBetween: 10,
		// autoplay: {
		// 	delay: 2500,
		// 	disableOnInteraction: false,
		// },
		// init: false,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		breakpoints: {
			640: {
				slidesPerView: 1,
				spaceBetween: 10,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 10,
			},
			1024: {
				slidesPerView: 4,
				spaceBetween: 10,
			},
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
</script>
<!-- Initialize Swiper -->
@endsection
