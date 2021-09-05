<!DOCTYPE html>
<html><head lang="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/lib/lobipanel/lobipanel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/separate/vendor/lobipanel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/lib/jqueryui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/separate/pages/widgets.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.toast.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/monthpicker/jquery-ui.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body class="with-side-menu control-panel control-panel-compact">
  <?php
  $url = URL::to('/');
  $string = request()->route()->getPrefix();
  $getprefix = str_replace('/', '', $string);
  ?>
  <div class="loader_panel" style="display: none;">
    <img src="{{ asset('admin/images/preloader.gif') }}">
  </div>
  <input type="hidden" value="{{ URL::to('/'.$getprefix.'/') }}" class="base_url">
    <header class="site-header">
        <div class="container-fluid">
            <a href="{{URL::to($getprefix.'/dashboard')}}" class="site-logo">
	            <img class="hidden-md-down" src="{{ asset('front/images/logo.png') }}" alt="">
	            <img class="hidden-lg-down" src="{{ asset('front/images/logo.png') }}" alt="">
	        </a>
            <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
            <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown dropdown-notification notif">
                            <a href="#" class="header-alarm dropdown-toggle active" id="dd-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <i class="font-icon-alarm"></i>
	                        </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
                                <div class="dropdown-menu-notif-header">
                                    Notifications
                                    <span class="label label-pill label-danger">4</span>
                                </div>
                                <div class="dropdown-menu-notif-list">
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <!-- <img src="img/photo-64-1.jpg" alt=""> -->
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Morgan</a> was bothering about something
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <!-- <img src="img/photo-64-2.jpg" alt=""> -->
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <!-- <img src="img/photo-64-3.jpg" alt=""> -->
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <!-- <img src="img/photo-64-4.jpg" alt=""> -->
                                        </div>
                                        <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-notif-more">
                                    <a href="#">See more</a>
                                </div>
                            </div>
                        </div>





                   <div class="dropdown user-menu"><p><b>Welcome : </b>Admin</p></div>
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

	                        </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">

                                <a class="dropdown-item" href="{{URL::to($getprefix.'/password')}}"><span class="font-icon glyphicon glyphicon-question-sign"></span>Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>


                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       @csrf
                                   </form>
                            </div>
                        </div>

                      <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
                    </div>
                    <!--.site-header-shown-->

                    <div class="mobile-menu-right-overlay"></div>

                    <!--.site-header-collapsed-->
                </div>
                <!--site-header-content-in-->
            </div>
            <!--.site-header-content-->
        </div>
        <!--.container-fluid-->
    </header>
    <!--.site-header-->
