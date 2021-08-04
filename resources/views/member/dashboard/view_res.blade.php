@extends('member.layouts.app')
@section('member')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-blue">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">View Resources</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('member') }}">Dashboard</a></li>
          <li><a href="#"><span>View Resources</span></a></li>
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
              <h6 class="panel-title txt-dark">View Resources</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">

              <div id="example-tabs">
                <section>
                  <div class="row mt-40">
                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <input type="hidden" name="id" value="{{ $resource->id }}">
                        <div class="row">
                          <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputEmail_2">Title</label>
                            <p>{{ $resource->title }}</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputEmail_2">Content</label>
                           <p>{!! $resource->content !!}</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputEmail_2">File</label>
                            <a download="" href="{{ asset('uploads/resources_file/'.$resource->file) }}" class="btn btn-sm btn-success">Download</a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputEmail_2">Uploaded On</label>
                            <p>{{ date('D, M j, Y', strtotime($resource->created_at))}}</p>
                          </div>
                        </div>
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