<div class="fixed-sidebar-left">
	<ul class="nav navbar-nav side-nav nicescroll-bar">
		<li>
			<a href="{{ route('admin') }}" class="{{ request()->is('admin') ? 'active' : '' }}"><i class="icon-picture mr-10"></i>Dashboard</a>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr" class="{{ request()->is('admin/active-members*') || request()->is('admin/inactive-members*') ? 'active' : '' }}"><i class="fa fa-users mr-10"></i>All Members <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="dashboard_dr" class="collapse collapse-level-1">
				<li>
					<a href="{{ route('admin_active_member') }}">Active Members</a>
				</li>
				<li>
					<a href="{{ route('admin_inactive_member') }}">Inactive Members</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="{{ route('admin_subscription') }}" class="{{ request()->is('admin/subscription*') ? 'active' : '' }}"><i class="fa fa-money mr-10"></i>Subscriptions</a>
		</li>
		<li>
			<a href="{{ route('admin_payment') }}" class="{{ request()->is('admin/payments*') ? 'active' : '' }}"><i class="fa fa-money mr-10"></i>Payments</a>
		</li>
		<li>
			<a href="{{ route('logout') }}" class="{{ request()->is('admin/assignments*') ? 'active' : '' }}"><i class="fa fa-file mr-10"></i>Resources</a>
		</li>
		<li>
			<a href="{{ route('admin_profile') }}" class="{{ request()->is('admin/profile') ? 'active' : '' }}"><i class="fa fa-user mr-10"></i>My Profile</a>
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