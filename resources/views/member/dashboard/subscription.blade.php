@extends('member.layouts.app')
@section('member')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-green">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-light">Membership Subscription</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('member') }}">Dashboard</a></li>
          <li><a href="#"><span>Membership Subscription</span></a></li>
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
              <h6 class="panel-title txt-dark">Current Membership Subscription</h6>
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
                        <th>Membership Plans</th>
                        <th>Annual Subscription Fee</th>
                        <th>Subscribed On</th>
                        <th>Expire On</th>
                      </tr>
                    </thead>
                    <tbody>
                     @if(Auth::user()->member == "None")

                     @else
                     <tr>
                        <td>{{$plan->name}}</td>
                        <td>₦{{number_format($plan->price)}}</td>
                        <td>{{ date('D, M j, Y', strtotime($plan->created_at))}}</td>
                        <td>{{ date('D, M j, Y', strtotime(Auth::user()->member_expire))}}</td>
                      </tr>
                     @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">All Membership Subscription Plans</h6>
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
                        <th>S/N</th>
                        <th>Membership Plans</th>
                        <th>Annual Subscription Fee</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    @isset($plans)
                      @foreach($plans as $plan)
                      <tr>
                        <td>
                          {{$sn++}}
                        </td>
                        <td>{{$plan->name}}</td>
                        <td>₦{{number_format($plan->price)}}</td>
                        <td>
                        @if(Auth::user()->member == "None")
                          <a class="btn btn-sm btn-success" href="{{ route('subscribe', $plan->id) }}">Subscibe</a>
                        @else
                          <a class="btn btn-sm btn-success" disabled>Subscibe</a>
                        @endif
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

    
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Payment History</h6>
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
                        <th>Membership Plan</th>
                        <th>Amount</th>
                        <th>Payer Name</th>
                        <th>Transaction ID</th>
                        <th>Prove</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    @isset($payments)
                      @foreach($payments as $payment)
                      <tr>
                        <td>
                          {{$snn++}}
                        </td>
                        <td>{{ $payment->plan->name }}</td>
                        <td>₦{{ number_format($payment->plan->price) }}</td>
                        <td>{{$payment->payer_name}}</td>
                        <td>{{$payment->trans_id}}</td>
                        <td>
                          <a class="btn btn-sm btn-success" target="blank" href="{{ asset('uploads/payment_prove/'.$payment->prove) }}">View</a>
                        </td>
                        <td>
                          {{$payment->status}}
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