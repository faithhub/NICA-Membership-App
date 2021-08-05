@extends('member.layouts.app')
@section('member')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-green">
      <div class="col-lg-3 col-md-5 col-sm-4 col-xs-12">
        <h5 class="txt-light">Payment Confirmation</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('member') }}">Dashboard</a></li>
          <li><a href="#"><span>Payment Confirmation</span></a></li>
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
              <h6 class="panel-title txt-dark">{{ $plan->name }} Membership Subscription Payment Confirmation</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div id="payment-form">
                <form method="POST" action="{{ route('subscribe_now_new') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Payer Name</label>
                        <input type="text" class="form-control" name="payer_name" value="{{ old('payer_name') }}">
                        @error('payer_name')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Transaction ID</label>
                        <input type="text" class="form-control" name="trans_id" value="{{ old('trans_id') }}">
                        @error('trans_id')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Payment Prove</label>
                        <input type="file" class="form-control" name="prove" value="{{ old('prove') }}" accept="image/*">
                        @error('prove')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                  </div>
                </form>
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