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

		<header class="sj-site-header">
			<div class="sj-topbar">
				<div class="container">
					<div class="sj-topbar-inner">
						<div class="sj-topbar-contact">
							<a href="mailto:info@saadijodi.com"><i class="fa fa-envelope"></i> info@saadijodi.com</a>
							<span class="sj-divider">|</span>
							<a href="tel:+919876543210"><i class="fa fa-phone"></i> +91 98765 43210</a>
						</div>
						<div class="sj-topbar-social">
							<a target="_blank" href="http://www.facebook.com/saadijodii"><i class="fa fa-facebook-f"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a target="_blank" href="http://www.instagram.com/saadijodi"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>

			<nav class="navbar navbar-expand-lg static-top sj-navbar">
				<div class="container">
					<a class="navbar-brand" href="{{URL::to('/')}}">
						<img src="{{ asset('front/images/logo.png') }}" alt="Saadi Jodi">
					</a>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarResponsive">
						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">

						@if (!empty(Auth::user()))
						<ul class="navbar-nav ml-auto sj-nav-links">
							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/listing')}}">Listings</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/connections')}}">Connections</a>
							</li>
							<li class="nav-item">
								<?php $count = App\Helpers\GlobalFunctions::getnotificationCount(Auth::User()->id); ?>
								<a class="nav-link" href="{{URL::to('/notification')}}">Notifications <span class="sj-badge @if($count == 0) d-none @endif header-badge notif-count">{{ $count }}</span></a>
							</li>

							@php $unreadmsg = App\Helpers\GlobalFunctions::unreadmessageHeader(Auth::User()->id); @endphp

							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/message')}}">Inbox <span class="sj-badge @if($unreadmsg == 0) d-none @endif unreadheadermessage unreadheadermessage{{ Auth::user()->id }}">{{ $unreadmsg }}</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{URL::to('/membership')}}">Membership</a>
							</li>
						
						</ul>

						<ul class="navbar-nav sj-nav-user">
							<li class="nav-item dropdown">
								<a class="nav-link sj-user-toggle" href="#" id="sjUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="sj-avatar-circle"><i class="fa fa-user"></i></span>
									{{ Auth::user()->firstName }} <i class="fa fa-caret-down"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="sjUserMenu">
									<a class="dropdown-item" href="{{URL::to('/profile')}}">My Profile</a>
									<a class="dropdown-item" href="{{URL::to('/change-password')}}">Change Password</a>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link sj-logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						</ul>
						@else
						<ul class="navbar-nav ml-auto sj-nav-user">
							<li class="nav-item">
								<a class="nav-link sj-login-link" href="{{URL::to('/register')}}">Register</a>
							</li>
							<li class="nav-item">
								<a class="nav-link sj-logout-btn" href="{{URL::to('/login')}}">Login</a>
							</li>
						</ul>
						@endif
					</div>
				</div>
			</nav>
		</header>
