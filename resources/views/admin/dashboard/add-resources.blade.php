@extends('admin.layouts.app')
@section('admin')

<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg  bg-blue">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">

          @isset($resource->id)
          Edit Resource
          @else
          Add New Resource
          @endisset

        </h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
          <li><a href="#"><span>

                @isset($resource->id)
                Edit Resource
                @else
                Add New Resource
                @endisset

              </span></a></li>
        </ol>
      </div>
      <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">
                @isset($resource->id)
                Edit Resource
                @else
                Add New Resource
                @endisset
              </h6>
            </div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div id="example-tabs">
                <section>
                  <div class="row mt-40">
                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <form method="POST" action="{{ route('admin_add_resource') }}" enctype="multipart/form-data">
                          @csrf
                          @isset($resource->id)
                          <input type="hidden" name="id" value="{{ $resource->id }}">
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Title</label>
                              <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ $resource->title }}" name="title">
                              @error('title')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Content</label>
                              <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." name="content">{{ $resource->content }}</textarea>
                              @error('content')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">File</label>
                              <input type="file" class="form-control" id="exampleInputEmail_2" name="file">
                              @error('file')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success  mr-10">Update</button>
                          </div>
                          @else
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Title</label>
                              <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ old('title') }}" name="title">
                              @error('title')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Content</label>
                              <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." name="content">{{ old('content') }}</textarea>
                              @error('content')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="control-label mb-10" for="exampleInputEmail_2">File</label>
                              <input type="file" class="form-control" id="exampleInputEmail_2" name="file">
                              @error('file')
                              <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success  mr-10">Add</button>
                          </div>
                          @endisset
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