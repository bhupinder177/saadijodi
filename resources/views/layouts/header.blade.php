<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="{{ asset('front/images/favicon.ico') }}">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="{{ asset('front/css/jquery.toast.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
		<title>Saadi jodi</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">

	</head>
	<body>
		<input type="hidden" value="{{ URL::to('/') }}" class="base_url">

		<div style="display:none" class="preloader">
     <div class="loader"></div>
    </div>

		<header>
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="telephone_cont">
								<p><i class="fa fa-envelope"></i> info@saadijodi.com</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="follow_icons">
								<span class="follow_fa">
									<a target="_blank" href="http://www.facebook.com/saadijodii">
									<i class="fa fa-facebook-f"></i>
								 </a>
								</span>
								<span class="follow_fa">
									<i class="fa fa-twitter"></i>
								</span>
								<span class="follow_fa">
									<i class="fa fa-google-plus"></i>
								</span>
								<span class="follow_fa">
									<i class="fa fa-linkedin"></i>
								</span>
								<!-- <span class="follow_fa">
									<i class="fa fa-pinterest-p"></i>
								</span> -->
								<span class="follow_fa">
									<a target="_blank" href="http://www.instagram.com/saadijodi">
									<i class="fa fa-instagram"></i>
								  </a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<nav class="navbar navbar-expand-lg static-top header_bg">
				<div class="container">
					<a class="navbar-brand" href="{{URL::to('/')}}">
						<img src="{{ asset('front/images/logo.png') }}" alt="">
					</a>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarResponsive">
						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">

						@if (!empty(Auth::user()))
						<ul class="navbar-nav ml-auto custom_cc">
							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/listing')}}">Lisitng </a>
							</li>
							<li class="nav-item">
								<?php $count = App\Helpers\GlobalFunctions::getnotificationCount(Auth::User()->id); ?>

								<a class="nav-link" href="{{URL::to('/notification')}}">Notification <?php if($count > 0){ echo '('. $count .')'; } ?></a>
							</li>

							@php $unreadmsg = App\Helpers\GlobalFunctions::unreadmessageHeader(Auth::User()->id); @endphp

							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/message')}}">Inbox <span class="@if($unreadmsg == 0) d-none @endif unreadheadermessage unreadheadermessage{{ Auth::user()->id }}">{{ $unreadmsg }}</span> </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/membership')}}">Membership </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/change-password')}}">Change Password </a>
							</li>
						</ul>
						@endif

						<ul class="navbar-nav ml-auto custom_cc_b">
							  @if (!Auth::user())
							<li class="nav-item">
								<a class="nav-link login_rg-b" href="{{URL::to('/register')}}">Register </a>
							</li>
							<li class="nav-item">
								<a class="nav-link login_rg-b mr-0" href="{{URL::to('/login')}}">Login</a>
							</li>
							@else
							<li class="nav-item">
								<a class="nav-link login_rg-b" href="{{URL::to('/profile')}}">{{ Auth::user()->firstName }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link login_rg-b mr-0" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>
		</header>
