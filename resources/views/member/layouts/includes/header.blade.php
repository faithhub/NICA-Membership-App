<nav class="navbar navbar-inverse navbar-fixed-top">
	<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
	<a href="index.html">
		<img class="brand-img pull-left" src="{{ asset('dist/img/logo.png') }}" alt="brand" /></a>
	<ul class="nav navbar-right top-nav pull-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">

				@if (Auth::user()->avatar != null)
				<img alt="" src="{{ asset('uploads/member_avatar/'.Auth::user()->avatar) }}" class="user-auth-img img-circle" width="32" height="32">
				@else
				<img alt="" src="{{ asset('uploads/avatar_pics.jpg') }}" class="user-auth-img img-circle" width="32" height="32">
				@endif
				<!-- <img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle" /> -->
				<span class="user-online-status"></span>
			</a>
			<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
				<li>
					<a href="{{ route('profile') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
				</li>
				<li>
					<a href="{{ route('resources') }}"><i class="fa fa-fw fa-file"></i> Resources</a>
				</li>
				<li>
					<a href="{{ route('subscription') }}"><i class="fa fa-fw fa-money"></i> Subscription</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
			</ul>
		</li>
	</ul>
	<div class="collapse navbar-search-overlap" id="site_navbar_search">
		<form role="search">
			<div class="form-group mb-0">
				<div class="input-search">
					<div class="input-group">
						<input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
						<span class="input-group-addon pr-30">
							<a href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
						</span>
					</div>
				</div>
			</div>
		</form>
	</div>
</nav>