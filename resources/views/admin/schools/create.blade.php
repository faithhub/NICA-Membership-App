@extends('admin.layouts.app')
@section('admin')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Schools</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li><a href="{{ url('admin/schools') }}">Schools</a></li>
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
                        @isset($school)
                        <h3 class="widget-title pb-0">Edit School</h3>
                        @else
                        <h3 class="widget-title pb-0">Create New School</h3>
                        @endisset
                        <div class="title-shape margin-top-10px"></div>
                    </div>
                </div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="widget-inner">
                    <div class="contact-form-action mb-4">
                        <form class="edit-profile m-b30" id="schoolForm" method="POST" action="{{ route('admin_create_school') }}">
                            @csrf
                            <div class="">
                                @isset($school)
                                <input type="hidden" name="id" value="{{ $school->id }}">
                                @endisset
                                <div class="form-group row mb-4">
                                    <label class="col-sm-2 col-form-label">School Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" @isset($school) value="{{ $school->name }}" @else value="{{ old('name') }}" @endisset placeholder="School of Applied Science">
                                        @error('name')
                                        <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="seperator"></div>
                            </div>

                            <div class="">
                                <div class="">
                                    <div class="row">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-7">
                                            <button type="submit" class="theme-btn border-0">
                                                @isset($school)
                                                Update
                                                @else
                                                Submit
                                                @endisset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end billing-form-item -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</div>
@endsection