<!-- header start -->
<header class="ttr-header">
	<div class="ttr-header-wrapper">
		<!--sidebar menu toggler start -->
		<div class="ttr-toggle-sidebar ttr-material-button">
			<i class="ti-close ttr-open-icon"></i>
			<i class="ti-menu ttr-close-icon"></i>
		</div>
		<!--sidebar menu toggler end -->
		<!--logo start -->
		<div class="ttr-logo-box">
			<div>
				<a href="{{ url('/') }}" class="ttr-logo">
					<img class="ttr-logo-mobile" alt="" src="{{ asset('dashboard/assets/images/logo-mobile.png') }}" width="30" height="30">
					<img class="ttr-logo-desktop" alt="" src="{{ asset('dashboard/assets/images/logo-white.png') }}" width="160" height="27">
				</a>
			</div>
		</div>
		<!--logo end -->
		<div class="ttr-header-menu">
			<!-- header left menu start -->
			<ul class="ttr-header-navigation">
				<li>
					<a href="{{ url('index') }}" class="ttr-material-button ttr-submenu-toggle">HOME</a>
				</li>
			</ul>
			<!-- header left menu end -->
		</div>
		<div class="ttr-header-right ttr-with-seperator">
			<!-- header right menu start -->
			<ul class="ttr-header-navigation">
				<li>
					<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar">
							@if (Auth::user()->avatar != null)
							<img alt="" src="{{ asset('uploads/student_avatar/'.Auth::user()->avatar) }}" width="32" height="32">
							@else
							<img alt="" src="{{ asset('uploads/avatar_pics.jpg') }}" width="32" height="32">
							@endif
						</span></a>
					<div class="ttr-header-submenu">
						<ul>
							<li><a href="{{ url('supervisor/profile') }}">My profile</a></li>
							<li><a href="{{ url('supervisor/students') }}">Students</a></li>
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</li>
						</ul>
					</div>
				</li>
			</ul>
			<!-- header right menu end -->
		</div>
	</div>
</header>
<!-- header end -->