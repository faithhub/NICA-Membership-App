@extends('member.layouts.app')
@section('member')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-blue">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">All Resources</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('member') }}">Dashboard</a></li>
          <li><a href="#"><span>All Resources</span></a></li>
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
              <h6 class="panel-title txt-dark">All Resources</h6>
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
                        <th>Tile</th>
                        <th>File</th>
                        <th>Date Uploaded</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @isset($resources)
                      @foreach($resources as $resource)
                      <tr>
                        <td>
                          {{$sn++}}
                        </td>
                        <td>{{$resource->title}}</td>
                        <td><a download="" href="{{ asset('uploads/resources_file/'.$resource->file) }}" class="btn btn-sm btn-success">Download</a></td>
                        <td>{{ date('D, M j, Y', strtotime($resource->created_at))}}</td>
                        <td class=" text-nowrap">
                          <a href="{{ route('view_resources', $resource->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                            View
                          </a>
                        </td>
                      </tr>

                      <!-- Edit Sub -->
                      <div class="modal fade" id="exampleModal{{$resource->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h5 class="modal-title" id="exampleModalLabel1">View Resources </h5>
                            </div>
                            <div class="modal-body">
                              <h3>Title</h3>
                              <p>{{$resource->title}}</p>
                              <h3>Content</h3>
                              <p>{!! $resource->content !!}</p>
                              <h3>File</h3>
                              <p><a download="" href="{{ asset('uploads/resources_file/'.$resource->file) }}" class="btn btn-sm btn-success">Download</a></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
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