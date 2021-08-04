@extends('admin.layouts.app')
@section('admin')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-blue">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">Active Members</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
          <li><a href="#"><span>Active Members</span></a></li>
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
              <h6 class="panel-title txt-dark">All Active Members</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table id="example" class="table table-hover display  pb-30">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Surname</th>
                        <th>Other Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Membership Plan</th>
                        <th>Registered On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @isset($members)
                      @foreach($members as $member)
                      <tr>
                        <td>
                          {{$sn++}}
                        </td>
                        <td>{{$member->surname}}</td>
                        <td>{{$member->other_name}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->phone_number}}</td>
                        <td>{{$member->member}}</td>
                        <td>{{ date('D, M j, Y', strtotime($member->created_at))}}</td>
                        <td class="text-nowrap">
                          <a href="{{ route('admin_edit_member', $member->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                            <i class="fa fa-pencil text-inverse m-r-10"></i>
                          </a>
                          <a href="{{ route('admin_view_member', $member->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                            <i class="fa fa-eye text-inverse m-r-10"></i>
                          </a>
                          <a href="{{ route('admin_delete_member', $member->id) }}" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this record?')">
                            <i class="fa fa-close text-danger"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                      @endisset
                    </tbody>
                  </table>

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