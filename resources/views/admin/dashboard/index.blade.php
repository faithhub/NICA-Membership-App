@extends('admin.layouts.app')
@section('admin')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-green">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">Welcome {{Auth::user()->surname}} {{Auth::user()->other_name}}</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
          <li><a href="#"><span>Admin</span></a></li>
          <li class="active"><span>Dashboard</span></li>
        </ol>
      </div>
      <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">

      <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
        <div class="panel panel-default card-view pa-0">
          <div class="panel-wrapper collapse in">
            <div class="panel-body pa-0">
              <div class="sm-data-box bg-blue">
                <div class="row ma-0">
                  <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                    <i class="fa fa-users txt-light"></i>
                  </div>
                  <div class="col-xs-7 text-center data-wrap-right">
                    <h6 class="txt-light">Active Members</h6>
                    <span class="txt-light counter counter-anim">{{$active}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default card-view pa-0">
          <div class="panel-wrapper collapse in">
            <div class="panel-body pa-0">
              <div class="sm-data-box bg-yellow">
                <div class="row ma-0">
                  <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                    <i class="fa fa-users txt-light"></i>
                  </div>
                  <div class="col-xs-7 text-center data-wrap-right">
                    <h6 class="txt-light">Inactive Members</h6>
                    <span class="txt-light counter">{{$inactive}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default card-view pa-0">
          <div class="panel-wrapper collapse in">
            <div class="panel-body pa-0">
              <div class="sm-data-box bg-green">
                <div class="row ma-0">
                  <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                    <i class="fa fa-money txt-light"></i>
                  </div>
                  <div class="col-xs-7 text-center data-wrap-right">
                    <h6 class="txt-light">Payments</h6>
                    <span class="txt-light counter">{{$inactive}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default card-view pa-0">
          <div class="panel-wrapper collapse in">
            <div class="panel-body pa-0">
              <div class="sm-data-box bg-grey">
                <div class="row ma-0">
                  <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                    <i class="fa fa-file txt-light"></i>
                  </div>
                  <div class="col-xs-7 text-center data-wrap-right">
                    <h6 class="txt-light">Resources</h6>
                    <span class="txt-light counter">{{$inactive}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Admin Profile</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mb-0">
                    <thead>
                      <tr>
                        <!-- <th>Task</th>
                        <th>Progress</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="20%">Surname</td>
                        <td>
                          {{Auth::user()->surname}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Other Name</td>
                        <td>
                          {{Auth::user()->other_name}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Email</td>
                        <td>
                          {{Auth::user()->email}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Phone Number</td>
                        <td>
                          {{Auth::user()->phone_number}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Account Status</td>
                        <td>
                          {{Auth::user()->status}}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="text-right mt-3">
                    <a class="btn btn-success" href="{{ route('admin_profile') }}">Edit Profile</a>
                  </div>
                </div>
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