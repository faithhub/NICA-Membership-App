@extends('student.layouts.app')
@section('student')
<main class="ttr-wrapper">
  <div class="container-fluid">
    <div class="db-breadcrumb">
      <h4 class="breadcrumb-title">Siwes {{$week->name}}</h4>
      <ul class="db-breadcrumb-list">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li>Siwes {{$week->name}}</li>
      </ul>
    </div>
    <div class="row">
      <div class="text-center">
        @if (session('success'))
        <div class="alert alert-success font-weight-700">
          {{ session('success') }}
          <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
        </div>
        @endif
      </div>
      <!-- Your Profile Views Chart -->
      <div class="col-lg-12 m-b30">
        <div class="widget-box">
          <div class="wc-title">
            <h2>Siwes {{$week->name}}</h2>
          </div>


          <div class="widget-box">
            <div class="widget-inner">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @isset($days)
                @foreach($days as $day)
                <li class="nav-item">
                  <a class="nav-link m-3 @once active @endonce" id="pills-{{$day->id}}-tab" data-toggle="pill" href="#pills-{{$day->id}}" role="tab" aria-controls="pills-{{$day->id}}" aria-selected="true">{{$day->name}}</a>
                </li>
                @endforeach
                @endisset
              </ul>
              <div class="tab-content" id="pills-tabContent">

                @isset($days)
                @foreach($days as $day)
                <div class="tab-pane fade @once show active @endonce" id="pills-{{$day->id}}" role="tabpanel" aria-labelledby="pills-{{$day->id}}-tab">
                  <form action="{{route('log')}}" method="post">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="hidden" name="week" value="{{$week->name}}">
                        <input type="hidden" name="week_id" value="{{$week->id}}">
                        <input type="hidden" name="day" value="{{$day->name}}">
                        <input type="hidden" name="day_id" value="{{$day->id}}">
                        <textarea class="form-control" name="log" placeholder="Write {{$day->name}} {{$week->name}} deatils...." style="min-height: 300px;">{{ $day->log->log ?? "" }}</textarea>
                        @error('log')
                        <span class="invalid-feedback mb-2" role="alert" style="display: block">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="">
                      <div class="">
                        <div class="row">
                          <div class="text-right">
                            <button type="submit" class="btn btn-success">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
                @endforeach
                @endisset
              </div>
            </div>
          </div>
        </div>
        <!-- Your Profile Views Chart END-->
      </div>
    </div>
</main>
@endsection