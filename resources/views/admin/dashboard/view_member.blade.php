@extends('admin.layouts.app')
@section('admin')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-green">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">{{$member->surname}} {{$member->other_name}}</h5>
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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">{{$member->surname}} {{$member->other_name}} Profile</h6>
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
                          {{$member->surname}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Other Name</td>
                        <td>
                          {{$member->other_name}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Email</td>
                        <td>
                          {{$member->email}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Phone Number</td>
                        <td>
                          {{$member->phone_number}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Account Status</td>
                        <td>
                          {{$member->status}}
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">Registered On</td>
                        <td>{{ date('D, M j, Y', strtotime($member->created_at))}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="text-right mt-3">
                    <a class="btn btn-success" href="{{ route('admin_edit_member', $member->id) }}">Edit Profile</a>
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