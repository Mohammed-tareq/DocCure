<!DOCTYPE html>
<html lang="en">

<!-- doccure/  30 Nov 2019 04:11:34 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>

		<!-- Favicons -->
		<link type="image/x-icon" href="{{ asset('assets/img/favicon.png" rel="icon')}}">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}">

        @stack('css')
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>
<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="{{ route('welcome') }}" class="navbar-brand logo">
							<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="{{ route('welcome') }}" class="menu-logo">
								<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="active">
								<a href="{{ route('welcome') }}">Home</a>
							</li>

							<li class="login-link">
								<a href="{{ route('register') }}">Login / Signup</a>
							</li>
						</ul>
					</div>
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="{{ route('register') }}">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->



            @yield('content')




	   </div>
	   <!-- /Main Wrapper -->

		<!-- jQuery -->
		<scrip src="{{ asset('assets/js/jquery.min.js"></scrip')}}">

		<!-- Bootstrap Core JS -->
		<scrip src="{{ asset('assets/js/popper.min.js"></scrip')}}">
		<scrip src="{{ asset('assets/js/bootstrap.min.js"></scrip')}}">

		<!-- Slick JS -->
		<scrip src="{{ asset('assets/js/slick.js"></scrip')}}">

        @stack('js')
		<!-- Custom JS -->
		<scrip src="{{ asset('assets/js/script.js"></scrip')}}">




	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>
