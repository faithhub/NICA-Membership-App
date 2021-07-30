@extends('member.layouts.app')
@section('member')
<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg bg-blue">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-light">Membership Form</h5>
      </div>
      <!-- Breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="{{ route('member') }}">Dashboard</a></li>
          <li><a href="#"><span>Membership</span></a></li>
          <li class="active"><span>Form</span></li>
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
              <h6 class="panel-title txt-dark">Membership Profile</h6>
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
                                <input type="text" class="form-control" id="exampleInputuname_2" value="{{ Auth::user()->surname }}" name="surname" />
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
                                <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ Auth::user()->other_name }}" name="other_name">
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
                                <input type="email" class="form-control" id="exampleInputuname_2" value="{{ Auth::user()->email }}" name="email" />
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
                                <input type="number" class="form-control" id="exampleInputEmail_2" value="{{ Auth::user()->phone_number }}" name="phone_number">
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
                                <input type="date" class="form-control" id="exampleInputuname_2" value="{{ Auth::user()->dob }}" name="dob" />
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
                            <textarea class="form-control" id="review" placeholder="Conatct Address" name="address">{{Auth::user()->address}}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Chapter & Zone to which you belong</label>
                            <input type="text" class="form-control" id="exampleInputuname_2" value="{{ Auth::user()->zone }}" name="zone" />
                            @error('zone')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <p>Institutions Attended, Qualifications and Dates</p>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputuname">Secondary</label>
                                <input type="text" class="form-control" id="exampleInputuname_2" value="{{ Auth::user()->sec_sch }}" name="sec_sch" />
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
                                <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ Auth::user()->uni_sch }}" name="uni_sch">
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
                                <input type="text" class="form-control" id="exampleInputEmail_2" value="{{ Auth::user()->other_sch }}" name="other_sch">
                                @error('other_sch')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Professional Qualifications/Certifications with Dates:</label>
                            <textarea class="form-control" id="review" placeholder="Professional Qualifications/Certifications with Dates" name="prof_qualification">{{Auth::user()->prof_qualification}}</textarea>
                            @error('prof_qualification')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Present Institution/Organisation:</label>
                            <textarea class="form-control" id="review" placeholder="Present Institution/Organisation" name="present_org">{{Auth::user()->present_org}}</textarea>
                            @error('present_org')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Present Appointment:</label>
                            <textarea class="form-control" id="review" placeholder="Present Appointment" name="present_appointment">{{Auth::user()->present_appointment}}</textarea>
                            @error('present_appointment')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Area(s) of Specialisation:</label>
                            <textarea class="form-control" id="review" placeholder="Area(s) of Specialisation" name="area_specs	">{{Auth::user()->area_specs}}</textarea>
                            @error('area_specs	')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Any other information you think will help the council in considering your application:</label>
                            <textarea class="form-control" id="review" placeholder="Any other information you think will help the council in considering your application" name="other_info">{{Auth::user()->other_info}}</textarea>
                            @error('other_info')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label class="control-label mb-10" for="review">Names, address and phone number of two referees who should be current members of the Association:</label>
                            <textarea class="form-control" id="review" placeholder="Names, address and phone number of two referees who should be current members of the Association" name="referees">{{Auth::user()->referees}}</textarea>
                            @error('referees')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
													<div class="checkbox checkbox-success">
														<input id="checkbox_hr" type="checkbox" name="terms">
														<label for="checkbox_hr">
															I hereby declare that all the information submitted on this form are true and that I will abide by the rules and regulations of Nigerian Corrosion Association.
														</label>
													</div>
</div>

                          <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success  mr-10">Submit</button>
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