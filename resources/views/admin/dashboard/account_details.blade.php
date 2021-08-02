@extends('admin.layouts.app')
@section('admin')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-blue">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">Membership Subscription Payment Account Details</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
          <li><a href="#"><span>Payment Account Update</span></a></li>
        </ol>
      </div>
      <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Update Subscription Account Details</h6>
            </div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div id="example-tabs">
                <section>
                  <div class="row mt-40">
                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <form method="POST" action="{{ route('admin_add_payment') }}">
                          @csrf
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Account Bank</label>
                              <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ $settings->bank }}" name="bank">
                              @error('bank')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Account Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ $settings->acc_name }}" name="acc_name">
                              @error('acc_name')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Account Number</label>
                              <input type="number" class="form-control" id="exampleInputEmail_2" value="{{ $settings->acc_number }}" name="acc_number">
                              @error('acc_number')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success  mr-10">Update</button>
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

      <div class="col-sm-12 col-md-6">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Subscription Account Details</h6>
            </div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div id="example-tabs">
                <section>
                  <div class="row mt-40">
                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <form>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Account Bank</label>
                              <h4><strong>{{$settings->bank ?? "Not uploaded yet" }}</strong></h4>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Account Name</label>
                              <h4><strong>{{$settings->acc_name ?? "Not uploaded yet" }}</strong></h4>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Account Number</label>
                              <h4><strong>{{$settings->acc_number ?? "Not uploaded yet" }}</strong></h4>
                            </div>
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