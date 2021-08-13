<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title', '')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css') }}">
	<link href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	@yield('customcss')
	<!-- THIS DASHBOARD BASED ON https://adminlte.io/themes/AdminLTE/index2.html -->
    </head>
    
	    
	</div>
	<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
	<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
	<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
	<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
	
	@yield('customjs')
    </body>
</html>
