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
                        <th>Member Name</th>
                        <th>Membership Plan</th>
                        <th>Amount</th>
                        <th>Payer NAme</th>
                        <th>Transaction ID</th>
                        <th>Payment Prove</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @isset($payments)
                      @foreach($payments as $payment)
                      <tr>
                        <td>
                          {{$sn++}}
                        </td>
                        <td>{{$payment->user->surname}} {{$payment->user->other_name}}</td>
                        <td>{{$payment->plan->name}}</td>
                        <td>₦{{ number_format($payment->plan->price) }}</td>
                        <td>{{$payment->payer_name}}</td>
                        <td>{{$payment->trans_id}}</td>
                        <td class="text-nowrap">
                          <a class="btn btn-sm btn-success" target="blank" href="{{ asset('uploads/payment_prove/'.$payment->prove) }}">View</a>
                          <a class="btn btn-sm btn-success" download="" href="{{ asset('uploads/payment_prove/'.$payment->prove) }}">Download</a>
                        </td>
                        <td class="text-nowrap">
                          @if($payment->status == 'Pending' || $payment->status == 'Declined')                          
                          <a class="btn btn-sm btn-success" href="{{ route('admin_approve_subscribe', $payment->id) }}" onclick="return confirm('Are you sure you want to Approve this payment?')">Approve</a>
                          @endif     
                          @if($payment->status == 'Pending' || $payment->status == 'Approve')
                          <a class="btn btn-sm btn-danger" href="{{ route('admin_decline_subscribe', $payment->id) }}" onclick="return confirm('Are you sure you want to Decline this payment?')">Decline</a>
                          @endif                                               
                        </td>

                        <!-- Edit Sub -->
                        <div class="modal fade" id="exampleModal{{$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
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
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $payment->surname }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Other Name:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $payment->other_name }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Membership Plan:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $payment->member }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Amount:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $payment->amount }}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label mb-10">Payment Transaction ID:</label>
                                    <input type="text" class="form-control" id="recipient-name1" value="{{ $payment->other_name }}" disabled>
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