<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hencework.com/theme/kenny/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 16:25:39 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>NIGERIAN CORROSION ASSOCIATION, MEMBERSHIP SIGN UP PAGE</title>
    <meta name="description" content="NIGERIAN CORROSION ASSOCIATION." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Kenny Admin, NIGERIAN CORROSION ASSOCIATION, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('nica.JPG') }}">
    <link rel="icon" href="{{ asset('nica.JPG') }}" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="{{ asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />



    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->

    <div class="wrapper pa-0">
        <!-- Main Content -->
        <div class="page-wrapper pa-0 ma-0">
            <div class="container-fluid">
                <!-- Row -->
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle">
                        <div class="auth-form  ml-auto mr-auto no-float" style="width: 700px;">
                            <div class="panel panel-default card-view mb-0">
                                <div class="text-center">
                                    <img src="{{ asset('nica.JPG') }}" style="max-width: 70px;">
                                    <h4><strong>NIGERIAN CORROSION ASSOCIATION</strong></h4>
                                </div>
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark text-center"></h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-wrap">
                                                    <form method="POST" action="{{ route('register') }}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Surname</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="exampleInputsurname_2" name="surname" value="{{ old('surname') }}" placeholder="Surname">
                                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                    </div>
                                                                    @error('surname')
                                                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Other Name</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control @error('other_name') is-invalid @enderror" id="exampleInputother_name_2" name="other_name" value="{{ old('other_name') }}" placeholder="Other Name">
                                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                    </div>
                                                                    @error('other_name')
                                                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                                    <div class="input-group">
                                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail_2" name="email" value="{{ old('email') }}" placeholder="Email Address">
                                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                    </div>
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Phone Number</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputphone_number_2" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number">
                                                                        <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                    </div>
                                                                    @error('phone_number')
                                                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputpwd_2">Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputpwd_2" placeholder="Enter Password">
                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                    </div>
                                                                    @error('password')
                                                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputpwd_2">Confirm Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="exampleInputpwd_2" placeholder="Confirm Password">
                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                    </div>
                                                                    @error('password_confirmation')
                                                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="checkbox checkbox-success pr-10 pull-left">
                                                                <input id="checkbox_2" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>
                                                                <label for="checkbox_2"> I agree to all <a class="txt-danger capitalize-font" href="#">terms</a></label>

                                                                @error('terms')
                                                                <span class="invalid-feedback" role="alert" style="display: block;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success btn-block">Sign Up</button>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="inline-block pr-5">Already have an account?</span>
                                                            <a type="submit" class="inline-block txt-danger" href="{{ route('login') }}">Sign In</a>
                                                        </div>

                                                        <div class="form-group mb-0 text-right">
                                                            <span class="inline-block pr-"></span>
                                                            <a class="inline-block txt-success" target="blank" href="{{ url('index') }}">Search Member</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('dist/js/init.js') }}"></script>
</body>

<!-- Mirrored from hencework.com/theme/kenny/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 16:25:40 GMT -->

</html>