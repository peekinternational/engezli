
<nav class="navbar navbar-expand-lg">
	<div class="container">
		<a class="navbar-brand" href="{{asset('/')}}">
			<img src="{{asset('images/logo.png')}}" alt="Logo" />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<!-- <span class="navbar-toggler-icon"></span> -->
		<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav main-menu">
				<li class="nav-item {{ Request()->is('/') ? 'active' : '' }}">
					<a href="{{url('/')}}" class="nav-link">{{ __('home.Home')}}</a>
				</li>
				<li class="nav-item {{ Request()->is('messages') ? 'active' : '' }}">
					<a class="nav-link message-anchor" href="{{url('messages')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						{{ __('home.Message')}}
						<span class="badge message-dot"></span>
					</a>
					@if(auth()->user())

					<div class="dropdown-menu notification" aria-labelled="navbarDropdown">
							<notification :userdata="{{auth()->user()}}"></notification>

					</div>
					@endif
				</li>
				<li class="nav-item {{ Request()->is('/order-details') ? 'active' : '' }}">
					<a class="nav-link notification-anchor" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						{{ __('home.Notifications')}}
						<span class="badge notification-dot"></span>
					</a>
					@if(auth()->user())
					<div class="dropdown-menu notification" aria-labelled="navbarDropdown">
							<ordernotification :userdata="{{auth()->user()}}"></ordernotification>

					</div>
					@endif
				</li>
				<li class="nav-item {{ Request()->is('manage-orders') ? 'active' : '' }}">
					<a href="{{url('manage-orders')}}" class="nav-link">{{ __('home.Order')}}</a>
				</li>
				<li class="nav-item {{ Request()->is('services/all') ? 'active' : '' }}">
					<a href="{{url('services/all')}}" class="nav-link">{{ __('home.Service')}}</a>
				</li>
				<li class="nav-item {{ Request()->is('contact') ? 'active' : '' }}">
					<a href="{{url('contact')}}" class="nav-link">{{ __('home.Contact')}}</a>
				</li>
			</ul>
			<form class="search-box form-inline" method="get" action="{{url('search')}}">
				<input type="text" placeholder="{{ __('home.Find services')}}" name="service_title" class="input" />
				<button class="search-btn">
				<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item dropdown language ">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<span> <i class="fa fa-globe"></i></span>
					</a>

					<div class="dropdown-menu" aria-labelled="navbarDropdown">
						<a href="{{ url('locale/en') }}" class="dropdown-item"  data-info="en" style="cursor:pointer;" >English</a>
						<a href="{{ url('locale/ar') }}" class="dropdown-item" data-info="ar" style="cursor:pointer;" >Arabic</a>
					</div>
				</li>
				<?php
					$currency = session()->get('currency');
				 ?>
				<li class="nav-item dropdown language ">
					<select class="custom-select" id="currency_type" name="currency_type">
						<option value="USD" {{$currency == 'USD' ? 'selected="selected"' : ''}}>USD</option>
						<option value="EGP" {{$currency == 'EGP' ? 'selected="selected"' : ''}}>EGP</option>
					</select>
				</li>
				@if(Auth::user() =='')
				<li class="nav-item sign-in-btn">
					<a class="nav-link" href="{{url('login')}}">{{ __('home.Sign in')}}</a>
				</li>
				<li class="nav-item sign-up-btn">
					<a class="nav-link" href="{{url('register')}}">{{ __('home.Sign up')}}</a>
				</li>
				@endif
				<li class="nav-item dropdown user-dropdown ">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						@if(Auth::user() !='')
							@if(Auth::user()->facebook_id != Null || Auth::user()->google_id != Null)
							<img src="{{Auth::user()->profile_image}}" alt="" class="rounded-circle">
							@elseif(Auth::user()->profile_image != Null)
                  			<img class="rounded-circle" src="{{asset('images/user_images/'.Auth::user()->profile_image)}}">
							@else
							<img src="{{asset('images/avatar (1).svg')}}" alt="">
							@endif
						@endif
					</a>
					<div class="dropdown-menu" aria-labelledبواسطة="navbarDropdown">
						<a class="dropdown-item" href="{{url('create-service')}}">{{ __('home.Create Service')}}</a>
						<a class="dropdown-item" href="{{url('profile')}}">{{ __('home.Profile')}}</a>
						<a class="dropdown-item" href="{{url('settings')}}">{{ __('home.Edit Profile')}}</a>
						<a class="dropdown-item" href="{{url('settings')}}">{{ __('home.Settings')}}</a>
						<a class="dropdown-item" href="#">{{ __('home.Help & Support')}}</a>
						<a class="dropdown-item" href="{{url('logout')}}">{{ __('home.logout')}}</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
