<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CMS | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}" rel="stylesheet"/>

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
	<div class="login-box">
	    <div class="login-logo">
		<a href="../../index2.html"><b>CMS</b>in</a>
	    </div>
	    <!-- /.login-logo -->
	    <div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>

		<form action="/login" method="post">
		    @csrf
		    <div class="form-group has-feedback">
			@if ($errors->any())
			    <div class="alert alert-danger">
				<ul>
				    @foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				    @endforeach
				</ul>
			    </div>
			@endif
			<input type="email" class="form-control" name="email" placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		    </div>
		    <div class="form-group has-feedback">
			<input type="password" class="form-control" name="password" placeholder="Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		    </div>
		    <div class="row">
			<div class="col-xs-8">
			    <div class="checkbox icheck">
				<label>
				    <input type="checkbox"> Remember Me
				</label>
			    </div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
			    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			</div>
			<!-- /.col -->
		    </div>
		</form>

		<a href="#">I forgot my password</a><br>
		<a href="register.html" class="text-center">Register a new membership</a>

	    </div>
	    <!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
	<script>
	 $(function () {
	     $('input').iCheck({
		 checkboxClass: 'icheckbox_square-blue',
		 radioClass: 'iradio_square-blue',
		 increaseArea: '20%' /* optional */
	     });
	 });
	</script>
    </body>
</html>
