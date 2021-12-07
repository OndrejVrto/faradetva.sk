<!DOCTYPE html>

@php
	$lang = str_replace('_', '-', app()->getLocale());
	$year = date("Y");
	$php_version = phpversion();
@endphp
<!--[if IE 8]> <html lang="{{ $lang }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ $lang }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="{{ $lang }}">
<!-- <![endif]-->

<head>

	<title>@yield('title', 'Administrácia') | Farnosť Detva</title>

	<meta charset="UTF-8" />
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<meta name="description" content="@yield('description', 'Webové stránky farnosťi Detva.')" />
	<meta name="keywords" content="@yield('keywords', 'farnosť, Detva, svadba, krst, oznamy, kňaz, predmanželská príprava, pohreb')">
	<meta name="author" content="Ing. Ondrej VRŤO, IWE" />
	<meta name="MobileOptimized" content="320" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- favicon-icon - realfavicongenerator.net-->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('icon/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('icon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('icon/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ URL::asset('icon/site.webmanifest') }}">
	<link rel="mask-icon" href="{{ URL::asset('icon/safari-pinned-tab.svg') }}" color="#5bbad5">
	<link rel="shortcut icon" href="{{ URL::asset('icon/favicon.ico') }}">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<meta name="msapplication-config" content="{{ URL::asset('icon/browserconfig.xml') }}">
	<meta name="theme-color" content="#ffffff">
	<!-- favicon-icon -->

	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" /> --}}
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
	@yield('third_party_stylesheets')
	@stack('page_css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Main Header -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="{{ URL::asset('avatar/admin-avatar.svg') }}" class="user-image img-circle elevation-2" alt="User Image">
						<span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<!-- User image -->
						<li class="user-header bg-primary">

							<img src="{{ URL::asset('avatar/admin-avatar.svg') }}" class="img-circle elevation-2" alt="User Image">
							<p>
								{{ Auth::user()->name }}
								<small>Zaregistrovaný od {{ Auth::user()->created_at->format('M. Y') }}</small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<a href="#" class="btn btn-default btn-flat">Profil</a>
							<a href="/" class="btn btn-default btn-flat float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Odhlásiť
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</nav>

		<!-- Left side column. contains the logo and sidebar -->
		@include('_partials.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<main class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">@yield('mainTitle', 'Administrácia')</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Domov</a></li>
						<li class="breadcrumb-item active">@yield('mainTitle', 'Administrácia')</li>
						</ol>
					</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<section class="content">
				@if(session()->has('success'))
				<div class="col-12 col-xl-8 m-auto">
					<div class="alert alert-success">
						{{ session()->get('success') }}
						<a href="" class="close" data-dismiss="alert"><i class="fas fa-times"></i></a>
					</div>
				</div>
				@endif
				@if(session()->has('alert'))
				<div class="col-12 col-xl-8 m-auto">
					<div class="alert alert-danger">
						{{ session()->get('alert') }}
						<a href="" class="close" data-dismiss="alert"><i class="fas fa-times"></i></a>
					</div>
				</div>
				@endif

<!-- /. Hlavný OBSAH -->



				@yield('content')



<!-- /. Hlavný OBSAH -->

			</section>
		</main>

		<!-- Main Footer -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>PHP Version: </b>{{ $php_version }}
			</div>
			<strong>Copyright &copy; 2014-{{ $year }} <a href="{{ route('home') }}">Farnosť Detva</a>.</strong> All rights reserved.
		</footer>
	</div>

	<script src="{{ mix('js/app.js') }}" defer></script>

	@yield('third_party_scripts')

	@stack('page_scripts')
</body>

</html>
