<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hencework.com/theme/kenny/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 16:25:39 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>NIGERIAN CORROSION ASSOCIATION, MEMBERSHIP SIGN IN PAGE</title>
    <meta name="description" content="NIGERIAN CORROSION ASSOCIATION." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Kenny Admin, NIGERIAN CORROSION ASSOCIATION, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

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
                        <div class="auth-form  ml-auto mr-auto no-float">
                            <div class="panel panel-default card-view mb-0">
                                <div class="text-center">
                                    <img src="https://media-exp1.licdn.com/dms/image/C560BAQHMnA03XDdf3w/company-logo_200_200/0/1519855918965?e=1635379200&v=beta&t=GwGNg2-PKyZvacCLcd_QO60aFTmu1QbeIWkK_tElsLI" style="max-width: 50px;">
                                    <h4><strong>NIGERIAN CORROSION ASSOCIATION</strong></h4>
                                </div>
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark"><strong>{{ __('Verify Your Email Address') }}</strong></h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-wrap">

                                                    @if (session('resent'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                                    </div>
                                                    @endif

                                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                                    {{ __('If you did not receive the email') }},
                                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">{{ __('click here to request another') }}</button>.
                                                    </form>
                                                    <div class="text-right" style="margin-top: 40px;">

                                                        <button type="submit" class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</button>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
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