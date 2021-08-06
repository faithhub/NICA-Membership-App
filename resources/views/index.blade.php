<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hencework.com/theme/kenny/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 16:24:11 GMT -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>NIGERIAN CORROSION ASSOCIATION | {{ $title ?? '' }}</title>
  <meta name="description" content="NIGERIAN CORROSION ASSOCIATION MEMBERSHIP APP" />
  <meta name="keywords" content="NIGERIAN CORROSION ASSOCIATION MEMBERSHIP APP" />
  <meta name="author" content="Faith Oluwadara" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('nica.JPG') }}">
  <link rel="icon" href="{{ asset('nica.JPG') }}" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

  <!-- Bootstrap Wysihtml5 css -->
  <link rel="stylesheet" href="{{ asset('vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css') }}" />

  <!-- Custom CSS -->
  <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">


  <link href="{{ asset('vendors/bower_components/jquery-wizard.js/css/wizard.css') }}" rel="stylesheet" type="text/css" />

  <!-- jquery-steps css -->
  <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.steps/demo/css/jquery.steps.css') }}">


  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
  <!-- Data table CSS -->
  <link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- bootstrap-touchspin CSS -->
  <link href="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
  @include('admin.layouts.includes.alert')

</head>

<body>
  <!--Preloader-->
  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>
  <!--/Preloader-->
  <div class="wrapper">

    <!-- /Left Sidebar Menu -->

    <!-- Right Sidebar Menu -->

    <!-- /Right Sidebar Menu -->

    <!-- Main Content -->

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-center text-center">
              <img src="https://media-exp1.licdn.com/dms/image/C560BAQHMnA03XDdf3w/company-logo_200_200/0/1519855918965?e=1635379200&v=beta&t=GwGNg2-PKyZvacCLcd_QO60aFTmu1QbeIWkK_tElsLI" style="max-width: 50px;">
              <h3 class="panel-title txt-dark" style="font-size: 30px; line-height: normal;"><strong>NIGERIAN CORROSION
                  ASSOCIATION MEMBERS</strong></h3>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="col-12">
                <form>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputuname">Surname</label>
                        <input type="text" class="form-control" id="exampleInputuname_2" value="" name="surname" />
                        @error('surname')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Other Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail_2" value="" name="other_name">
                        @error('other_name')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Zone</label>
                        <input type="text" class="form-control" id="exampleInputEmail_2" value="" name="other_name">
                        @error('other_name')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Specialization</label>
                        <input type="text" class="form-control" id="exampleInputEmail_2" value="" name="other_name">
                        @error('other_name')
                        <span class="invalid-feedback" role="alert" style="display: block;">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-success">Search</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
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
                            Viewx
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
                  <p>Already have an account <a href="{{ route('login') }}">Login</a></p>
                  <p>Didn't have an account <a href="{{ route('register') }}">Register</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
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

  <!-- wysuhtml5 Plugin JavaScript -->
  <script src="{{ asset('vendors/bower_components/wysihtml5x/dist/wysihtml5x.min.js') }}"></script>

  <script src="{{ asset('vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js') }}">
  </script>

  <!-- Fancy Dropdown JS -->
  <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

  <!-- Bootstrap Wysuhtml5 Init JavaScript -->
  <script src="{{ asset('dist/js/bootstrap-wysuhtml5-data.js') }}"></script>

  <!-- Slimscroll JavaScript -->
  <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

  <!-- Init JavaScript -->
  <script src="{{ asset('dist/js/init.js') }}"></script>


  <script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

  <!-- Form Wizard JavaScript -->
  <script src="{{ asset('vendors/bower_components/jquery.steps/build/jquery.steps.min.js') }}"></script>
  <script src="{{ asset('ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js') }}"></script>

  <!-- Form Wizard Data JavaScript -->
  <script src="{{ asset('dist/js/form-wizard-data.js') }}"></script>

  <!-- Data table JavaScript -->
  <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>

  <!-- Bootstrap Touchspin JavaScript -->
  <script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}">
  </script>

  <!-- Starrr JavaScript -->
  <script src="{{ asset('dist/js/starrr.js') }}"></script>

  <!-- Fancy Dropdown JS -->
  <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>


  <script src="{{ asset('dist/js/export-table-data.js') }}"></script>


  <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <!-- <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script> -->
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/pdfmake/build/pdfmake.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/pdfmake/build/vfs_fonts.js') }}"></script>

  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
</body>


<!-- Mirrored from hencework.com/theme/kenny/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 16:24:14 GMT -->

</html>