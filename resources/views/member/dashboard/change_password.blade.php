@extends('member.layouts.app')
@section('member')
<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg bg-blue">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-light">Member Password</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('member') }}">Dashboard</a></li>
          <li><a href="#"><span>Member</span></a></li>
          <li class="active"><span>Password</span></li>
        </ol>
      </div>
      <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Memeber Update Password</h6>
            </div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div id="example-tabs">
                <section>
                  <div class="row mt-40">
                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <form method="POST" action="{{ route('admin_password') }}">
                          @csrf
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputuname">Current Password</label>
                              <input type="password" class="form-control" id="exampleInputuname_2" name="old_password" />
                              @error('old_password')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputuname">New Password</label>
                              <input type="password" class="form-control" id="exampleInputuname_2" name="new_password" />
                              @error('new_password')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Confirm New Password</label>
                              <input type="password" class="form-control" id="exampleInputEmail_2" name="confirm_new_password">
                              @error('confirm_new_password')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                      </div>

                      <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success  mr-10">Change</button>
                      </div>
                      </form>
                    </div>
                  </div>
              </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->

</div>
</div>
@endsection