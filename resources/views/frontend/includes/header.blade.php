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
				<li class="nav-item">
					<a href="{{url('/')}}" class="nav-link">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						Message
					</a>
					<div class="dropdown-menu notification" aria-labelled="navbarDropdown">
						<a class="dropdown-item" href="#">
							<div class="contacts-list-item">
								<div class="avatar">
									<img src="{{asset('images/avatar (1).svg')}}" alt="" />
								</div>
								<div class="text">
									<h4>sohanur rahman <span class="time">12:00 pm</span></h4>
									<p>Lorem ipsum dolor sit amet.</p>
								</div>
							</div>
						</a>
						<a class="dropdown-item" href="#">
							<div class="contacts-list-item">
								<div class="avatar">
									<img src="{{asset('images/avatar (1).svg')}}" alt="" />
								</div>
								<div class="text">
									<h4>sohanur rahman <span class="time">12:00 pm</span></h4>
									<p>Lorem ipsum dolor sit amet.</p>
								</div>
							</div>
						</a>
						<a class="dropdown-item" href="#">
							<div class="contacts-list-item">
								<div class="avatar">
									<img src="{{asset('images/avatar (1).svg')}}" alt="" />
								</div>
								<div class="text">
									<h4>sohanur rahman <span class="time">12:00 pm</span></h4>
									<p>Lorem ipsum dolor sit amet.</p>
								</div>
							</div>
						</a>
						<a class="dropdown-item" href="#">
							<div class="contacts-list-item">
								<div class="avatar">
									<img src="{{asset('images/avatar (1).svg')}}" alt="" />
								</div>
								<div class="text">
									<h4>sohanur rahman <span class="time">12:00 pm</span></h4>
									<p>Lorem ipsum dolor sit amet.</p>
								</div>
							</div>
						</a>
						<a class="dropdown-item" href="#">
							<div class="contacts-list-item">
								<div class="avatar">
									<img src="{{asset('images/avatar (1).svg')}}" alt="" />
								</div>
								<div class="text">
									<h4>sohanur rahman <span class="time">12:00 pm</span></h4>
									<p>Lorem ipsum dolor sit amet.</p>
								</div>
							</div>
						</a>
						<a class="dropdown-item" href="#">
							<div class="contacts-list-item">
								<div class="avatar">
									<img src="{{asset('images/avatar (1).svg')}}" alt="" />
								</div>
								<div class="text">
									<h4>sohanur rahman <span class="time">12:00 pm</span></h4>
									<p>Lorem ipsum dolor sit amet.</p>
								</div>
							</div>
						</a>
					</div>
				</li>
				<li class="nav-item">
					<a href="{{url('order')}}" class="nav-link">Order</a>
				</li>
				<li class="nav-item">
					<a href="{{url('services')}}" class="nav-link">Service</a>
				</li>
				<li class="nav-item">
					<a href="{{url('contact')}}" class="nav-link">Contact</a>
				</li>
			</ul>
			<form class="search-box form-inline">
				<input type="text" placeholder="Find Service..." class="input" />
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
						<a class="dropdown-item english-format" href="#">English</a>
						<a class="dropdown-item arabic-format" href="#">Arabic</a>
					</div>
				</li>
				<!-- <li class="nav-item sign-in-btn">
					<a class="nav-link" href="sign_in.html">Sign in</a>
				</li>
				<li class="nav-item sign-up-btn">
					<a class="nav-link" href="sign_up.html">Sign up</a>
				</li> -->
				<li class="nav-item dropdown user-dropdown ">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<img src="{{asset('images/avatar (1).svg')}}" alt="">
					</a>
					<div class="dropdown-menu" aria-labelledبواسطة="navbarDropdown">
						<a class="dropdown-item" href="profile.html">profile</a>
						<a class="dropdown-item" href="#">edit profile</a>
						<a class="dropdown-item" href="settings.html">settings</a>
						<a class="dropdown-item" href="#">help & support</a>
						<a class="dropdown-item" href="{{url('logout')}}">logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>