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

	@include('member.layouts.includes.style')
	@include('member.layouts.includes.alert')

</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
	<div class="wrapper">

		<!-- Top Menu Items -->
		@include('member.layouts.includes.header')
		<!-- /Top Menu Items -->

		<!-- Left Sidebar Menu -->
		@include('member.layouts.includes.sidemenu')
		<!-- /Left Sidebar Menu -->

		<!-- Right Sidebar Menu -->
		@yield('member')
		<!-- /Right Sidebar Menu -->

		<!-- Main Content -->
		<!-- /Main Content -->

	</div>
	<!-- /#wrapper -->

	<!-- JavaScript -->
	@include('member.layouts.includes.script')
</body>


<!-- Mirrored from hencework.com/theme/kenny/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 16:24:14 GMT -->

</html>