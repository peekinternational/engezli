@extends('frontend.layouts.master')
@section('title', 'Home  ')
@section('styling')
@endsection
@section('content')
<!-- Begin Page Content -->
<section class="py-5 homepage-search-block position-relative">
	<div class="container">
		<div class="row py-lg-5">
			<div class="col-lg-7">
				<div class="homepage-search-title">
					<h1 class="mb-3 text-shadow text-gray-900 font-weight-bold">Find The Perfect Services with PaidPro For Your Business</h1>
					<!-- <h5 class="mb-5 text-shadow text-gray-800 font-weight-normal">Millions of people use miver to turn their ideas into reality. -->
					</h5>
				</div>
				<div class="homepage-search-form">
					<form class="form-noborder">
						<div class="form-row">
							<div class="col-lg-10 col-md-10 col-sm-12 form-group">
								<input type="text" placeholder="Find Services..."
								class="form-control border-0 form-control-lg shadow-sm">
								<button type="submit" class="btn btn-success btn-lg btn-gradient shadow-sm btn-main-search"><i
								class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="popular">
					<!-- <span class="text-body-2">Popular</span> -->
					<ul>
						<li><a href="#" class="text-body-2">Logo Design</a></li>
						<li><a href="#" class="text-body-2">Video Editing</a></li>
						<li><a href="#" class="text-body-2">Translation</a></li>
						<li><a href="#" class="text-body-2">Voice Over</a></li>
						<li><a href="#" class="text-body-2">Development</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-5">
				<img class="img-fluid" src="{{asset('frontend-assets/images/banner.svg')}}" alt='' />
			</div>
		</div>
	</div>
</section>
<!--       social -->
<!-- <ul class="trusted-by bg-white border-bottom">
	<li><img src="{{asset('frontend-assets/images/facebook.png')}}"></li>
	<li><img src="{{asset('frontend-assets/images/google.png')}}"></li>
	<li><img src="{{asset('frontend-assets/images/mit.png')}}"></li>
	<li><img src="{{asset('frontend-assets/images/netflix.png')}}"></li>
	<li><img src="{{asset('frontend-assets/images/paypal.png')}}"></li>
	<li><img src="{{asset('frontend-assets/images/intuit.png')}}"></li>
	<li><img src="{{asset('frontend-assets/images/facebook.png')}}"></li>
</ul> -->
<!--       social -->
<!--       recent -->
<!--       freelancer projects -->
<section class="market-wrapper py-5">
	<div class="container">
	  <h2 class="text-center">It's Easy to do it with Engezly</h2>
	  <p class="text-center">Follow these steps</p>
	  <div class="row d-flex justify-content-center">
	  	<div class="col text-center">
	  		<img src="{{asset('frontend-assets/images/search.jpeg')}}" width="100px" class="pb-3">
	  		<h6><strong>Search For a service</strong></h6>
	  		<p>Find the service you need using the search box at the top or through labels</p>
	  	</div>
	  	<div class="col text-center">
	  		<img src="{{asset('frontend-assets/images/search.jpeg')}}" width="100px" class="pb-3">
	  		<h6><strong>Choose and expert</strong></h6>
	  		<p>Reveiw the service description and buyer ratings and request them to open contact with seller.</p>
	  	</div>
	  	<div class="col text-center">
	  		<img src="{{asset('frontend-assets/images/start_selling.png')}}" width="100px" class="pb-3">
	  		<h6><strong>Get your work done</strong></h6>
	  		<p>Contact the seller directly within PaidPro site until you receive your complete order.</p>
	  	</div>
	  </div>
	</div>
</section>
<!-- <div class="freelance-projects bg-white py-5">
	<div class="container">
		<div class="row freelance-slider">
			<div class="col">
				<div class="freelancer">
					<img src="{{asset('frontend-assets/images/senatopcustudio.jpg')}}">
					<div class="freelancer-footer">
						<img src="{{asset('frontend-assets/images/user/s7.png')}}">
						<h5>Logo Design
						<span>by <i>John</i></span>
						</h5>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="freelancer">
					<img src="{{asset('frontend-assets/images/vnuggz.jpg')}}">
					<div class="freelancer-footer">
						<img src="{{asset('frontend-assets/images/user/s8.png')}}">
						<h5>Web &amp; Mobile Design
						<span>by <i>John</i></span>
						</h5>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="freelancer">
					<img src="{{asset('frontend-assets/images/digitalgeria.jpg')}}">
					<div class="freelancer-footer">
						<img src="{{asset('frontend-assets/images/user/s1.png')}}">
						<h5>Packaging Design
						<span>by <i>John</i></span>
						</h5>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="freelancer">
					<img src="images/artsi3d.jpg">
					<div class="freelancer-footer">
						<img src="images/user/s2.png">
						<h5>Brand Style Guides
						<span>by <i>John</i></span>
						</h5>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="freelancer">
					<img src="{{asset('frontend-assets/images/designerheather.jpg')}}">
					<div class="freelancer-footer">
						<img src="{{asset('frontend-assets/images/user/s3.png')}}">
						<h5>Illustration
						<span>by <i>John</i></span>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--       freelancer projects -->
<!--    about section -->
<div class="market-wrapper py-5 bg-white">
   <div class="container">
      <h2 class="text-center">Categories you can search for</h2>
      <p class="text-center">All categories are currently available</p>
      <ul class="categories-list mb-0">
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/graphics.svg')}}" alt="" loading="lazy">Graphics &amp; Design
            </a>
         </li>
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/online-marketing.svg')}}" alt="Digital Marketing" loading="lazy">Digital Marketing
            </a>
         </li>
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/writing-translation.svg')}}" alt="Writing &amp; Translation" loading="lazy">Writing &amp; Translation
            </a>
         </li>
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/video-animation.svg')}}" alt="Video &amp; Animation" loading="lazy">Video &amp; Animation
            </a>
         </li>
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/music-audio.svg')}}" alt="Music &amp; Audio" loading="lazy">Music &amp; Audio</a>
         </li>
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/programming.svg')}}" alt="Programming &amp; Tech" loading="lazy">Programming &amp; Tech
            </a>
         </li>
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/business.svg')}}" alt="Business" loading="lazy">Business</a>
         </li>
         <li>
            <a href="#">
            <img src="{{asset('frontend-assets/images/lifestyle.svg')}}" alt="Lifestyle" loading="lazy">Lifestyle
            </a>
         </li>
      </ul>
   </div>
</div>
<!--     market   -->
<div class="get-started our-profile">
	<div class="container">
		<div class="content">
			<div class="row justify-content-center d-flex">
				<div class="col-12 col-sm-4 text-left">
					<img src="{{asset('frontend-assets/images/winner.png')}}" class="float-left mr-3">
					<div class="pl-2">
						<h3><strong>70000</strong></h3>
						<span>Employee around the Middle East</span>
					</div>
				</div>
				<div class="col-12 col-sm-4 text-left">
					<img src="{{asset('frontend-assets/images/winner.png')}}" class="float-left mr-3">
					<div class="pl-2">
						<h3><strong>10000</strong></h3>
						<span>Completed Job</span>
					</div>
				</div>
				<div class="col-12 col-sm-4 text-left">
					<img src="{{asset('frontend-assets/images/winner.png')}}" class="float-left mr-3">
					<div class="pl-2">
						<h3><strong>99%</strong></h3>
						<span>Customer satisfaction rate</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--       recent -->
<section class="py-5">
	<div class="view_slider recommended">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3>Top Rated Services on PaidPro</h3>
					<div class="view recent-slider recommended-slider">
						<div>
							<a href="#">
								<img class="img-fluid" src="{{asset('frontend-assets/images/list/v1.png')}}" />
							</a>
							<div class="inner-slider">
								<div class="inner-wrapper">
									<div class="d-flex align-items-center">
										<span class="seller-image">
											<img class="img-fluid"
											src="{{asset('frontend-assets/images/user/s1.png')}}"
											alt='' />
										</span>
										<span class="seller-name">
											<a href="#">Marcin Kowalski</a>
											<span class="level hint--top level-one-seller">
												Level 1 Seller
											</span>
										</span>
									</div>
									<h3>I will create professional audio ads or radio commercials for your project</h3>
									<div class="content-info">
										<div class="rating-wrapper">
											<span class="gig-rating text-body-2">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
													<path fill="currentColor"
														d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
													</path>
												</svg>
												5.0
												<span>(7)</span>
											</span>
										</div>
									</div>
									<div class="footer">
										<i class="fa fa-heart" aria-hidden="true"></i>
										<div class="price">
											<a href="#">
												Starting At <span> $1,205</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<a href="#">
								<img class="img-fluid" src="{{asset('frontend-assets/images/list/v2.png')}}" />
							</a>
							<div class="inner-slider">
								<div class="inner-wrapper">
									<div class="d-flex align-items-center">
										<span class="seller-image">
											<img class="img-fluid"
											src="{{asset('frontend-assets/images/user/s2.png')}}"
											alt='' />
										</span>
										<span class="seller-name">
											<a href="#">Marcin Kowalski</a>
											<span class="level hint--top level-one-seller">
												Level 1 Seller
											</span>
										</span>
									</div>
									<h3>I will create professional audio ads or radio commercials for your project</h3>
									<div class="content-info">
										<div class="rating-wrapper">
											<span class="gig-rating text-body-2">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
													<path fill="currentColor"
														d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
													</path>
												</svg>
												5.0
												<span>(7)</span>
											</span>
										</div>
									</div>
									<div class="footer">
										<i class="fa fa-heart" aria-hidden="true"></i>
										<div class="price">
											<a href="#">
												Starting At <span> $1,205</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<a href="#">
								<img class="img-fluid" src="{{asset('frontend-assets/images/list/v3.png')}}" />
							</a>
							<div class="inner-slider">
								<div class="inner-wrapper">
									<div class="d-flex align-items-center">
										<span class="seller-image">
											<img class="img-fluid"
											src="{{asset('frontend-assets/images/user/s3.png')}}"
											alt='' />
										</span>
										<span class="seller-name">
											<a href="#">Marcin Kowalski</a>
											<span class="level hint--top level-one-seller">
												Level 1 Seller
											</span>
										</span>
									</div>
									<h3>I will create professional audio ads or radio commercials for your project</h3>
									<div class="content-info">
										<div class="rating-wrapper">
											<span class="gig-rating text-body-2">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
													<path fill="currentColor"
														d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
													</path>
												</svg>
												5.0
												<span>(7)</span>
											</span>
										</div>
									</div>
									<div class="footer">
										<i class="fa fa-heart" aria-hidden="true"></i>
										<div class="price">
											<a href="#">
												Starting At <span> $1,205</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<a href="#">
								<img class="img-fluid" src="{{asset('frontend-assets/images/list/v4.png')}}" />
							</a>
							<div class="inner-slider">
								<div class="inner-wrapper">
									<div class="d-flex align-items-center">
										<span class="seller-image">
											<img class="img-fluid"
											src="{{asset('frontend-assets/images/user/s4.png')}}"
											alt='' />
										</span>
										<span class="seller-name">
											<a href="#">Marcin Kowalski</a>
											<span class="level hint--top level-one-seller">
												Level 1 Seller
											</span>
										</span>
									</div>
									<h3>I will create professional audio ads or radio commercials for your project</h3>
									<div class="content-info">
										<div class="rating-wrapper">
											<span class="gig-rating text-body-2">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
													<path fill="currentColor"
														d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
													</path>
												</svg>
												5.0
												<span>(7)</span>
											</span>
										</div>
									</div>
									<div class="footer">
										<i class="fa fa-heart" aria-hidden="true"></i>
										<div class="price">
											<a href="#">
												Starting At <span> $1,205</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<a href="#">
								<img class="img-fluid" src="{{asset('frontend-assets/images/list/v5.png')}}" />
							</a>
							<div class="inner-slider">
								<div class="inner-wrapper">
									<div class="d-flex align-items-center">
										<span class="seller-image">
											<img class="img-fluid"
											src="{{asset('frontend-assets/images/user/s5.png')}}"
											alt='' />
										</span>
										<span class="seller-name">
											<a href="#">Marcin Kowalski</a>
											<span class="level hint--top level-one-seller">
												Level 1 Seller
											</span>
										</span>
									</div>
									<h3>I will create professional audio ads or radio commercials for your project</h3>
									<div class="content-info">
										<div class="rating-wrapper">
											<span class="gig-rating text-body-2">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
													<path fill="currentColor"
														d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
													</path>
												</svg>
												5.0
												<span>(7)</span>
											</span>
										</div>
									</div>
									<div class="footer">
										<i class="fa fa-heart" aria-hidden="true"></i>
										<div class="price">
											<a href="#">
												Starting At <span> $1,205</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<a href="#">
								<img class="img-fluid" src="{{asset('frontend-assets/images/list/v6.png')}}" />
							</a>
							<div class="inner-slider">
								<div class="inner-wrapper">
									<div class="d-flex align-items-center">
										<span class="seller-image">
											<img class="img-fluid"
											src="{{asset('frontend-assets/images/user/s6.png')}}"
											alt='' />
										</span>
										<span class="seller-name">
											<a href="#">Marcin Kowalski</a>
											<span class="level hint--top level-one-seller">
												Level 1 Seller
											</span>
										</span>
									</div>
									<h3>I will create professional audio ads or radio commercials for your project</h3>
									<div class="content-info">
										<div class="rating-wrapper">
											<span class="gig-rating text-body-2">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
													<path fill="currentColor"
														d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
													</path>
												</svg>
												5.0
												<span>(7)</span>
											</span>
										</div>
									</div>
									<div class="footer">
										<i class="fa fa-heart" aria-hidden="true"></i>
										<div class="price">
											<a href="#">
												Starting At <span> $1,205</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--       recent -->
<!--       services-->
<!-- <div class="services-wrapper bg-white py-5">
	<div class="container">
		<h2>Popular Professional Services</h2>
		<div class="row service-slider">
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-01.jpg')}}">
					<h3><span>Build Your Brand</span> Logo Design</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-02.jpg')}}">
					<h3><span>Customize your site</span> wordpress</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-03.jpg')}}">
					<h3><span>share your message</span> voice over</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-04.jpg')}}">
					<h3><span>engage your audience</span> whiteboard</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-05.jpg')}}">
					<h3><span>reach more customers</span> social media</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-01.jpg')}}">
					<h3><span>Build Your Brand</span> Logo Design</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-02.jpg')}}">
					<h3><span>Customize your site</span> wordpress</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-03.jpg')}}">
					<h3><span>share your message</span> voice over</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-04.jpg')}}">
					<h3><span>engage your audience</span> whiteboard</h3>
				</div>
			</div>
			<div class="col">
				<div class="service">
					<img src="{{asset('frontend-assets/images/service-05.jpg')}}">
					<h3><span>reach more customers</span> social media</h3>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--       services-->
<!--       testimonials -->
<!-- <div class="testi-wrap pt-5">
	<div class="container">
		<div class="testimonial">
			<div class="video-modal">
				<div class="picture-wrapper">
					<img src="{{asset('frontend-assets/images/1440-haerfest-2x.jpg')}}">
				</div>
			</div>
			<div class="text-content">
				<p>"Being a small but growing brand, we have to definitely do a lot more with less. And when you want to create a business bigger than yourself, you’re going to need help. And that’s what Miver
					does"
				</p>
				<span>Tim and Dan Joo, Co-founders</span>
				<img alt="Company logo" src="{{asset('frontend-assets/images/haerfest-logo.png')}}" loading="lazy">
			</div>
		</div>
	</div>
</div> -->
<!--       testimonials -->
<!--       guides  -->
<!-- <div class="guide-wrapper py-5">
	<div class="container">
		<h2>
		Miver
		Guides
		<a href="#" class="float-right">See More guides></a>
		</h2>
		<div class="row">
			<div class="col-md-4">
				<a href="#" class="guide">
					<img src="{{asset('frontend-assets/images/guide-01.jpg')}}">
					<div class="content">
						<h6>Create a Website</h6>
						<p>Building a stunning website from A to Z</p>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" class="guide">
					<img src="{{asset('frontend-assets/images/guide-02.jpg')}}">
					<div class="content">
						<h6>Grow With Digital Marketing</h6>
						<p>Promoting your business online</p>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" class="guide">
					<img src="{{asset('frontend-assets/images/guide-03.jpg')}}">
					<div class="content">
						<h6>Build a Strong Brand</h6>
						<p>Differentiating yourself from the competition</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</div> -->
<!--       guides  -->
<!-- get started -->
<div>
	<div class="get-started">
		<div class="content">
			<h2>Find Freelance Services For Your Business Today</h2>
			<p>We've got you covered for all your business needs</p>
			<a href="#" class="c-btn c-fill-color-btn">Get Started</a>
		</div>
	</div>
</div>
<!-- get started -->
@endsection
@section('script')
@endsection