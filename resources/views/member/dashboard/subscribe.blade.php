@extends('member.layouts.app')
@section('member')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-green">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">{{ $plan->name }} Membership Subscription Plan</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('member') }}">Dashboard</a></li>
          <li><a href="#"><span>{{ $plan->name }} Membership Subscription Plan</span></a></li>
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
              <h6 class="panel-title txt-dark">{{ $plan->name }} Membership Subscription Plan</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div id="details">
                <p>Membership Subscription Details</p>
                <h5>Subscription Name:</h5>
                <h3><strong>{{$plan->name}}</strong></h3>
                <h5>Subscription Annual Fee:</h5>
                <h3><strong>₦{{number_format($plan->price)}}</strong></h3>
                <br>
                <p>Account Payment Details</p>
                <h5>Bank Name:</h5>
                <h3><strong>{{$setting->bank}}</strong></h3>
                <h5>Account Name:</h5>
                <h3><strong>{{$setting->acc_name}}</strong></h3>
                <h5>Account Number:</h5>
                <h3><strong>{{$setting->acc_number}}</strong></h3>
                <br>
                <p>Click the button bellow after making a successful transaction</p>
                <br>
                <a class="btn btn-success" href="{{ route('subscribe_now', $plan->id) }}">Confirm Payment</a>
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