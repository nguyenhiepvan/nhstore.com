<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	@yield('title')
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" type="image/png" href="/favi.png" />
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{asset('assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('assets/backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{asset('assets/backend/bower_components/Ionicons/css/ionicons.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('assets/backend/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="{{asset('assets/backend/dist/css/skins/_all-skins.min.css')}}">
  	<link rel="stylesheet" href="{{mix('/css/animate.css')}}">
  	<link rel="stylesheet" href="{{ asset('assets/backend/fancybox/fancybox.min.css') }}">
  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	<style type="text/css">
  		.icons{
  			width: 20px;
  			margin-right: 5px;
  		}
  		q {
  			font-style: italic;
  		}
  	</style>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
  	<meta name="csrf-token" content="{{ csrf_token() }}">
  	@yield('css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  	<!-- Site wrapper -->
  	<div class="wrapper">
  		@include('backend.layouts.admin.header')
  		<!-- =============================================== -->
  		@include('backend.layouts.admin.sidebar')
  		<!-- =============================================== -->
  		@yield('content')
  		@include('backend.layouts.admin.footer')
	<!-- Add the sidebar's background. This div must be placed
		immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
	<!-- jQuery 3 -->
	<script src="{{asset('assets/backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset('assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<!-- SlimScroll -->
	<script src="{{asset('assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<!-- FastClick -->
	<script src="{{asset('assets/backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('assets/backend/dist/js/adminlte.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('assets/backend/dist/js/demo.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<!-- Add fancyBox -->
	<script type="text/javascript" src="{{ asset('assets/backend/fancybox/fancybox.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('.sidebar-menu').tree()
		})
	</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
	@yield('script')
</body>
</html>