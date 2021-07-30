@extends('admin.layouts.app')
@section('admin')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-green">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-light">Welcome {{Auth::user()->surname}} {{Auth::user()->other_name}}</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Member Profile</h6>
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
                        <td width="20%">Membership Level</td>
                        <td>
                          {{Auth::user()->member}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Account Status</td>
                        <td>
                          {{Auth::user()->status}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Date of Birth</td>
                        <td>
                          {{ date('D, M j, Y \a\t g:ia', strtotime(Auth::user()->dob)) ?? "Not Updated Yet"}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Sex</td>
                        <td>
                          {{Auth::user()->sex ?? "Not Updated Yet"}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Zone</td>
                        <td>
                          {{Auth::user()->zone ?? "Not Updated Yet"}}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="text-right mt-3">
                    <a class="btn btn-success" href="{{ route('profile') }}">Edit Profile</a>
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