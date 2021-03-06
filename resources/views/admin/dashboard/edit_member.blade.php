@extends('admin.layouts.app')
@section('admin')
<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg bg-blue">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h5 class="txt-light">{{$member->surname}} {{$member->other_name}} Membership Details</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
          <li><a href="#"><span>Membership</span></a></li>
          <li class="active"><span>Details</span></li>
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
              <h6 class="panel-title txt-dark">{{$member->surname}} {{$member->other_name}} Profile</h6>
            </div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div id="example-tabs">
                <section>
                  <div class="row mt-40">
                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <form method="POST" action="{{ route('profile') }}">
                          @csrf
                          <!-- <div class="form-group">
                            <label class="control-label mb-10" for="review">Your rating</label>
                            <div class='product-rating starrr' id='star1'></div>
                          </div> -->
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputuname">Surname</label>
                                <input type="text" class="form-control" id="exampleInputuname_2" value="{{ $member->surname }}" name="surname" />
                                @error('surname')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_2">Other Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ $member->other_name }}" name="other_name">
                                @error('other_name')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputuname">Email Address</label>
                                <input type="email" class="form-control" id="exampleInputuname_2" value="{{ $member->email }}" name="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_2">Phone Number</label>
                                <input type="number" class="form-control" id="exampleInputEmail_2" value="{{ $member->phone_number }}" name="phone_number">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputuname">Date of Birth</label>
                                <input type="date" class="form-control" id="exampleInputuname_2" value="{{ $member->dob }}" name="dob" />
                                @error('dob')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_2">Sex</label>
                                <select class="form-control" name="sex">
                                  <option value="">Select Sex</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                                @error('sex')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_2">Marital Status</label>
                                <select class="form-control" name="marital_status">
                                  <option value="">Select Marital Status</option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                </select>
                                @error('marital_status')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_2">Nationality</label>
                                <select class="form-control" name="country">
                                  <option value="">Select Country</option>
                                </select>
                                @error('country')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Contact Address:</label>
                            <textarea class="form-control" id="review" name="address">{{$member->address}}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Chapter & Zone to which you belong</label>
                            <input type="text" class="form-control" id="exampleInputuname_2" value="{{ $member->zone }}" name="zone" />
                            @error('zone')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <fieldset>
                            <legend>Institutions Attended, Qualifications and Dates</legend>                            
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputuname">Secondary</label>
                                <input type="text" class="form-control" id="exampleInputuname_2" value="{{ $member->sec_sch }}" name="sec_sch" />
                                @error('sec_sch')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_2">University</label>
                                <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ $member->uni_sch }}" name="uni_sch">
                                @error('uni_sch')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_2">Others</label>
                                <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ $member->other_sch }}" name="other_sch">
                                @error('other_sch')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                          </fieldset>

                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Professional Qualifications/Certifications with Dates:</label>
                            <textarea class="form-control" id="review" name="prof_qualification">{{$member->prof_qualification}}</textarea>
                            @error('prof_qualification')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Present Institution/Organisation:</label>
                            <textarea class="form-control" id="review" name="present_org">{{$member->present_org}}</textarea>
                            @error('present_org')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Present Appointment:</label>
                            <textarea class="form-control" id="review" name="present_appointment">{{$member->present_appointment}}</textarea>
                            @error('present_appointment')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Area(s) of Specialisation:</label>
                            <textarea class="form-control" id="review" name="area_specs	">{{$member->area_specs}}</textarea>
                            @error('area_specs ')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Any other information you think will help the council in considering your application:</label>
                            <textarea class="form-control" id="review" name="other_info">{{$member->other_info}}</textarea>
                            @error('other_info')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Names, address and phone number of two referees who should be current members of the Association:</label>
                            <textarea class="form-control" id="review" name="referees">{{$member->referees}}</textarea>
                            @error('referees')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <div class="checkbox checkbox-success">
                              <input id="checkbox_hr" type="checkbox" name="terms" {{ old('terms') ? 'checked' : '' }}>
                              <label for="checkbox_hr">
                                I hereby declare that all the information submitted on this form are true and that I will abide by the rules and regulations of Nigerian Corrosion Association.
                              </label>
                            </div>
                            @error('referees')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
    </div>
    <!-- /Row -->

  </div>
</div>
@endsection