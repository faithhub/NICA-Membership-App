@extends('supervisor.layouts.app')
@section('supervisor')

<!--Main container start -->
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Supervisor Profile</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
				<li>Supervisor Profile</li>
			</ul>
		</div>
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<h4>Supervisor Profile</h4>
					</div>
					<div class="widget-inner">
						<form class="edit-profile m-b30" method="POST" action="{{ route('supervisor_profile') }}" enctype="multipart/form-data">
							@csrf
							<div class="">
								<div class="form-group row">
									<div class="col-sm-10  ml-auto">
										<h3>1. {{Auth::user()->name}} Personal Details</h3>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Supervisor ID</label>
									<div class="col-sm-7">
										<input class="form-control" type="" readonly value="{{Auth::user()->unique}}">
										{{-- <span class="help">If you want your invoices addressed to a company. Leave blank to use your full name.</span> --}}
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-7">
										<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{Auth::user()->email}}">
										@error('email')
										<span class="invalid-feedback mb-2" role="alert" style="display: block">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Name</label>
									<div class="col-sm-7">
										<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{Auth::user()->name}}">
										@error('name')
										<span class="invalid-feedback mb-2" role="alert" style="display: block">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Phone Number</label>
									<div class="col-sm-7">
										<input class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" type="number" value="{{Auth::user()->phone_number}}">
										@error('phone_number')
										<span class="invalid-feedback mb-2" role="alert" style="display: block">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Profile Picture</label>
									<div class="col-sm-7">
										<input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" max="50000">
										@error('avatar')
										<span class="invalid-feedback mb-2" role="alert" style="display: block">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="seperator"></div>
							</div>
							<div class="">
								<div class="">
									<div class="row">
										<div class="col-sm-2">
										</div>
										<div class="col-sm-7">
											<button type="submit" class="btn">Save changes</button>
											<button type="reset" class="btn-secondry">Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<form class="edit-profile" method="post" action="{{ route('supervisor-change-password') }}">
							@csrf
							<div class="">
								<div class="form-group row">
									<div class="col-sm-10 ml-auto">
										<h3>2. Password Updates</h3>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Current Password</label>
									<div class="col-sm-7">
										<input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" placeholder="Current password">
										@error('old_password')
										<span class="invalid-feedback mb-2" role="alert" style="display: block">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">New Password</label>
									<div class="col-sm-7">
										<input class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password" placeholder="New password">
										@error('new_password')
										<span class="invalid-feedback mb-2" role="alert" style="display: block">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Re Type Password</label>
									<div class="col-sm-7">
										<input class="form-control @error('confirm_new_password') is-invalid @enderror" type="password" name="confirm_new_password" placeholder="Repeat new password">
										@error('confirm_new_password')
										<span class="invalid-feedback mb-2" role="alert" style="display: block">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
								</div>
								<div class="col-sm-7">
									<button type="submit" class="btn">Save changes</button>
									<button type="reset" class="btn-secondry">Cancel</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>
@endsection