<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" href="{{ asset('admin/images/fv.jpg') }}" type="image/x-icon">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('admin/css/separate/pages/login.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/loginpage.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/lib/font-awesome/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/css/lib/bootstrap/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/css/jquery.toast.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="hold-transition login-page">

    <div class="loader_panel" style="display: none;">
      <img  src="{{ asset('admin/images/preloader.gif') }}">
    </div>
  <div class="login_panel" >
    	<div class="login_bx">
        	<div class="login_logo">
          	<img height="150" width="150" src="{{ asset('front/images/logo.png') }}" alt=""/>
            </div>
        	<h3>Login</h3>
          <form class="" id="loginform" method="post" action="{{ url('admin/login') }}">

          <div class="form-group">
              <input type="text"  id="email" name="email"  class="form-control" placeholder="Please enter email">


          </div>
           <div class="form-group">
              <input   name="password" id="password" type="password" class="form-control" placeholder="Please enter password">
          </div>
          <!-- <div class="form-group text-right">
              <a href="{{url('/admin/forgot-password')}}" class="forgot">Forgot Password?</a>
            </div> -->

          <button type="submit"  class="btn btn-primary">
              Login
          </button>
</form>

    </div>
  </div>


<!-- jQuery 3 -->
<script src="{{ asset('admin/js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/popper/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/lib/jqueryui/jquery-ui.min.js') }}"></script><!-- <script type="text/javascript" src="../../../www.gstatic.com/charts/loader.js"></script> -->
<script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.toast.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>

</body>
</html>
