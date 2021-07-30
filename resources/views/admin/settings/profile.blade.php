@extends('admin.layouts.app')
@section('admin')

<div class="row">
  <div class="col-lg-12">
    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
      <div class="section-heading">
        <h2 class="sec__title">My Profile</h2>
      </div><!-- end section-heading -->
      <ul class="list-items d-flex align-items-center">
        <li class="active__list-item"><a href="#">Home</a></li>
        <li class="active__list-item">Dashboard</li>
        <li>My Profile</li>
      </ul>
    </div><!-- end breadcrumb-content -->
  </div><!-- end col-lg-12 -->
</div><!-- end row -->

<div class="row mt-5">
  <form method="post" class="col-lg-12" enctype="multipart/form-data" action="{{ route('admin_profile') }}">
    @csrf
    <div class="col-lg-12">
      <div class="user-profile-action-wrap mb-5">
        <div class="user-profile-action mb-4 d-flex align-items-center">
          <div class="user-pro-img">
            <img src="{{Auth::user()->avatar != null ? asset('uploads/student_avatar/'.Auth::user()->avatar) : asset('web2/images/avatar.png')}}" alt="user-image" class="img-fluid radius-round border">
          </div>
          <div class="upload-btn-box">
            <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" max="500000">
            <p>Max file size is 5MB, Minimum dimension: 200x200 And Suitable files are .jpg & .png<span class="text-danger">*</span></p>
            @error('avatar')
            <span class="invalid-feedback mb-2" role="alert" style="display: block">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div><!-- end user-profile-action -->
      </div><!-- end user-profile-action-wrap -->
    </div><!-- end col-lg-12 -->
    <div class="col-lg-12">
      <div class="edit-profile">
        <div class="user-form-action">
          <div class="billing-form-item">
            <div class="billing-title-wrap">
              <h3 class="widget-title pb-0">My Profile</h3>
              <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content">
              <div class="contact-form-action">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-box">
                      <label class="label-text">Admin ID</label>
                      <div class="form-group">
                        <input class="form-control" type="text" name="username" value="{{Auth::user()->unique}}" readonly>
                      </div>
                    </div><!-- end input-box -->
                  </div><!-- end col-lg-6 -->
                  <div class="col-lg-6">
                    <div class="input-box">
                      <label class="label-text">Email</label>
                      <div class="form-group">
                        <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}">
                        @error('first_name')
                        <span class="invalid-feedback mb-2" role="alert" style="display: block">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div><!-- end input-box -->
                  </div><!-- end col-lg-6 -->
                  <div class="col-lg-6">
                    <div class="input-box">
                      <label class="label-text">Name <span class="text-danger">*</span></label>
                      <div class="form-group">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{Auth::user()->name}}">
                        @error('name')
                        <span class="invalid-feedback mb-2" role="alert" style="display: block">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div><!-- end input-box -->
                  </div><!-- end col-lg-6 -->

                  <div class="col-lg-6">
                    <div class="input-box">
                      <label class="label-text">Phone number <span class="text-danger">*</span></label>
                      <div class="form-group">
                        <input class="form-control @error('phone_number') is-invalid @enderror" type="number" name="phone_number" value="{{Auth::user()->phone_number}}" placeholder="+1 246-345-0695">
                        @error('phone_number')
                        <span class="invalid-feedback mb-2" role="alert" style="display: block">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div><!-- end col-lg-6 -->
                </div><!-- end row -->
              </div><!-- end contact-form-action -->
            </div><!-- end billing-content -->
          </div>
        </div><!-- end user-form-action -->
      </div><!-- end edit-profile-wrap -->
    </div><!-- end col-lg-12 -->
    <div class="col-lg-12">
      <div class="btn-box">
        <button class="theme-btn border-0" type="submit">Update Profile</button>
      </div>
    </div>
  </form>
</div><!-- end row -->
@endsection