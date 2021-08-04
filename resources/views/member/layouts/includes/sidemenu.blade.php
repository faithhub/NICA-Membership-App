<div class="fixed-sidebar-left">
	<ul class="nav navbar-nav side-nav nicescroll-bar">
		<li>
			<a href="{{ route('member') }}" class="{{ request()->is('member') ? 'active' : '' }}"><i class="icon-picture mr-10"></i>Dashboard</a>
		</li>
		<li>
			<a href="{{ route('subscription') }}" class="{{ request()->is('member/subscription*') ? 'active' : '' }}"><i class="fa fa-money mr-10"></i>Subscription</a>
		</li>
		<li>
			<a href="{{ route('resources') }}" class="{{ request()->is('member/resources*') || request()->is('member/view-resources*') ? 'active' : '' }}"><i class="fa fa-file mr-10"></i>Resources</a>
		</li>
		<li>
			<a href="{{ route('profile') }}" class="{{ request()->is('member/profile') ? 'active' : '' }}"><i class="fa fa-users mr-10"></i>Membership Profile</a>
		</li>
		<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-lock mr-10"></i>Logout</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
			</form>
		</li>
	</ul>
</div>