<div class="footer">
	<div class="container">
		<div class="footer-nav">
			<div class="footer-hearder">
				<img src="{{asset('images/logo.svg')}}" alt="" />
				<p>&copy; {{ __('home.copyrights')}}</p>
			</div>
			<div class="social-icons">
				<ul>
					<li>
						<a href=""><i class="fa fa-facebook-f"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-instagram"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-linkedin"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-twitter"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="footer-content">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					<div class="engezly">
						<h5>engezly</h5>
						<ul>
							<li><a href="">{{ __('home.Home')}}</a></li>
							<li><a href="">{{ __('home.How it work')}}</a></li>
							<li><a href="">{{ __('home.FAQs')}}</a></li>
							<li><a href="">{{ __('home.Privary Policy')}}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
					<div class="categories">
						<h5>{{ __('home.Categories')}}</h5>
						<div class="inner-list-group">
							@foreach(Engezli::get_categories()->chunk(4) as $chunk)
							<ul>
          			@foreach($chunk as $category)
          			<li><a href="{{url('categories/'.$category->cat_url)}}">{{$category->cat_title}}</a></li>
          		@endforeach
							</ul>
          		@endforeach
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="payment-methods">
						<h5>{{ __('home.payment methods')}}</h5>
						<ul>
							<li>
								<a href="">
									<img src="{{asset('images/fawry.svg')}}" alt="">
								</a>
							</li>
							<li>
								<a href="">
									<img src="{{asset('images/visa.svg')}}" alt="">
								</a>
							</li>
							<li>
								<a href="">
									<img src="{{asset('images/mastercard.svg')}}" alt="">
								</a>
							</li>
							<li>
								<a href="">
									<img src="{{asset('images/Meeza_Egyptian_company_logo.svg')}}" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					<div class="support">
						<h5>{{ __('home.Support')}}</h5>
						<ul>
							<li><a href="{{url('/help-center')}}">{{ __('home.Help & Support')}}</a></li>
							<li><a href="">{{ __('home.Trust & Safety')}}</a></li>
							<li><a href="">{{ __('home.Selling on Engezly')}}</a></li>
							<li><a href="">{{ __('home.Buying on Engezly')}}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
