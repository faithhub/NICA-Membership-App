@extends('admin.layouts.app')
@section('admin')

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
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
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
              <h6 class="panel-title txt-dark">All Membership Subscription Plans</h6>
            </div>
            <div class="clearfix"></div>
            <div class="text-right">
              <a class="btn btn-sm btn-success" data-original-title="Edit" data-toggle="modal" data-target="#exampleModalCreate" data-whatever="@mdo" href="">Add New Subscription</a>
            </div>
            <!--Create Sub -->
            <div class="modal fade" id="exampleModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel1">Create Subscription </h5>
                  </div>
                  <form method="POST" action="{{ route('admin_subscription') }}">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="control-label mb-10">Subscription Name:</label>
                        <input type="text" class="form-control" id="recipient-name1" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label mb-10">Subscription Annual Fee:</label>
                        <input type="number" class="form-control" id="recipient-name1" name="price" value="{{ old('price') }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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
                      @isset($subs)
                      @foreach($subs as $sub)
                      <tr>
                        <td>
                          {{$sn++}}
                        </td>
                        <td>{{$sub->name}}</td>
                        <td>₦{{number_format($sub->price)}}</td>
                        <td class="text-nowrap">
                          <a href="#" class="mr-25" data-original-title="Edit" data-toggle="modal" data-target="#exampleModal{{$sub->id}}" data-whatever="@mdo">
                            <i class="fa fa-pencil text-inverse m-r-10"></i>
                          </a>
                          <a href="{{ route('admin_delete_plan', $sub->id) }}" data-toggle="tooltip" data-original-title="Close" onclick="return confirm('Are you sure you want to delete this record?')">
                            <i class="fa fa-close text-danger"></i>
                          </a>
                        </td>
                      </tr>

                      <!-- Edit Sub -->
                      <div class="modal fade" id="exampleModal{{$sub->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h5 class="modal-title" id="exampleModalLabel1">Edit Subscription </h5>
                            </div>
                            <form method="POST" action="{{ route('admin_subscription') }}">
                              @csrf
                              <input type="hidden" value="{{ $sub->id }}" name="id">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label mb-10">Subscription Name:</label>
                                  <input type="text" class="form-control" id="recipient-name1" name="update_name" value="{{ $sub->name }}">
                                  @error('update_name')
                                  <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label mb-10">Subscription Annual Fee:</label>
                                  <input type="number" class="form-control" id="recipient-name1" name="update_price" value="{{ $sub->price }}">
                                  @error('update_price')
                                  <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
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