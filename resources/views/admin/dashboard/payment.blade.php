@extends('admin.layouts.app')
@section('admin')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-blue">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">Membership Subscription Payment</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
          <li><a href="#"><span>Membership Subscription Payment</span></a></li>
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
              <h6 class="panel-title txt-dark">All Membership Subscription Payment Made</h6>
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
                        <th>Membership Plan</th>
                        <th>Amount</th>
                        <th>Payment Prove</th>
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
                        <td class="text-nowrap">
                          <a href="#" class="mr-25" data-original-title="View" data-toggle="modal" data-target="#exampleModal{{$member->id}}" data-whatever="@mdo">
                            <i class="fa fa-eye text-inverse m-r-10"></i>
                          </a>
                        </td>

                        <!-- Edit Sub -->
                        <div class="modal fade" id="exampleModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Subscription </h5>
                              </div>
                              <form method="POST" action="{{ route('admin_subscription') }}">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Surname:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $member->surname }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Other Name:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $member->other_name }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Membership Plan:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $member->member }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Amount:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $member->amount }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Payment Transaction ID:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $member->other_name }}" disabled>
                                  </div>
                                </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Other Name:</label>
                                    <img>
                                  </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger">Decline</button>
                                  <button type="submit" class="btn btn-primary">Approve</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>>
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