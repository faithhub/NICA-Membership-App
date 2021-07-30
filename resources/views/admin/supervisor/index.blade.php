@extends('admin.layouts.app')
@section('admin')
<div class="row">
  <div class="col-lg-12">
    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
      <div class="section-heading">
        <h2 class="sec__title">Supervisors</h2>
      </div><!-- end section-heading -->
      <ul class="list-items d-flex align-items-center">
        <li class="active__list-item"><a href="#">Home</a></li>
        <li class="active__list-item"><a href="{{ url('admin') }}">Dashboard</a></li>
        <li><a href="{{ url('admin/supervisors') }}">Supervisors</a></li>
      </ul>
    </div><!-- end breadcrumb-content -->
  </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
  <div class="col-lg-12">
    <div class="billing-form-item">
      <div class="billing-title-wrap">
        <div class="row">
          <div class="col-10">
            <h3 class="widget-title pb-0">All Supervisors</h3>
            <div class="title-shape margin-top-10px"></div>
          </div>
          <div class="col-2">
            <div class="text-right">
              <a href="{{ url('admin/add-supervisor') }}" class="btn btn-success">Add Supervisor</a>
            </div>
          </div>
        </div>

        <!-- {{print_r($supervisors)}} -->
      </div><!-- billing-title-wrap -->
      <div class="billing-content pb-0">
        <div class="">
          <div class="table-responsive">
            @isset($supervisors)
            @if ($supervisors->isEmpty())
            <div class="text-center mb-4">
              <h4>No Supervisor Created yet</h4>
            </div>
            @else
            <table class="table paginated table-striped" id="myTable" width="100%">
              <thead class="table-dark">
                <tr>
                  <th>S/N</th>
                  <th>Supervisor Email</th>
                  <th>Supervisor Name</th>
                  <th>Status</th>
                  <th>School</th>
                  <th>Department</th>
                  <th class="">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($supervisors as $supervisor)
                <tr>
                  <td>{{$sn++}}</td>
                  <td>
                    <div class="manage-candidate-wrap">
                      <h2 class="widget-title pb-0 font-size-15">
                        <b>{{$supervisor->email}}</b>
                      </h2>
                    </div><!-- end manage-candidate-wrap -->
                  </td>
                  <td class="text-capitalize">
                    <div class="manage-candidate-wrap">
                      <h2 class="widget-title pb-0 font-size-15"><b><a class="text-success" href="{{ url('admin/view-lecturer', $supervisor->id) }}">{{$supervisor->name}}</a></b></h2>
                    </div><!-- end manage-candidate-wrap -->
                  </td>
                  <td>
                    <div class="manage-candidate-wrap">
                      <h2 class="widget-title pb-0 font-size-15">
                        @if ($supervisor->status == 'Active')
                        <span class="new-users-info"><span class="btn btn-success btn-sm">{{$supervisor->status}}</span></span><br>
                        @else
                        <span class="new-users-info"><span class="btn btn-danger btn-sm">{{$supervisor->status}}</span></span><br>
                        @endif
                      </h2>
                    </div><!-- end manage-candidate-wrap -->
                  </td>
                  <td>
                    <div class="manage-candidate-wrap">
                      <h2 class="widget-title pb-0 font-size-15">
                        <b>{{$supervisor->school->name }}</b>
                      </h2>
                    </div><!-- end manage-candidate-wrap -->
                  </td>
                  <td>
                    <div class="manage-candidate-wrap">
                      <h2 class="widget-title pb-0 font-size-15">
                        <b>{{$supervisor->dept->name}}</b>
                      </h2>
                    </div><!-- end manage-candidate-wrap -->
                  </td>
                  <td>
                    <!-- Example single danger button -->
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ url('admin/view-supervisor', $supervisor->id) }}" title="View supervisor" class="btn btn-success m-1"><i class="la la-eye" data-toggle="tooltip" data-placement="top"></i></a>
                      @if ($supervisor->status == 'Active')
                      <a href="{{ url('admin/block-supervisor', $supervisor->id) }}" title="Deny Access" onclick="return confirm('Are you sure you want to Deny Access for this supervisor?')" class="btn btn-danger m-1"><i class="la la-lock" data-toggle="tooltip" data-placement="top"></i></a>
                      @else
                      <a href="{{ url('admin/unblock-supervisor', $supervisor->id) }}" title="Grant Access" onclick="return confirm('Are you sure you want to  Grant this supervisor Access?')" class="btn btn-success m-1"><i class="la la-unlock" data-toggle="tooltip" data-placement="top"></i></a>
                      @endif
                      <a href="{{ url('admin/edit-supervisor', $supervisor->id) }}" title="Edit supervisor" class="btn btn-dark m-1"><i class="la la-pencil" data-toggle="tooltip" data-placement="top"></i></a>
                      <a href="{{ url('admin/delete-supervisor', $supervisor->id) }}" title="Delete supervisor" class="btn btn-danger m-1" onclick="return confirm('Are you sure you want to delete this supervisor?')"><i class="la la-trash" data-toggle="tooltip" data-placement="top"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{-- <div id="pagination" class="text-center" style="display:inline"></div> --}}
            @endif
            @endisset
          </div>
        </div><!-- end billing-content -->
      </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
  </div><!-- end row -->
</div>
@endsection