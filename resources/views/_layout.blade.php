<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="css/navbar.css">
	<!-- <link rel="stylesheet" href="css/debug.css"> -->
	<title>Symaker 2.0</title>
	@include('_styles')
	@yield('styles')
</head>
<body>
	@include('_navbar')
	<div id="layout" class="columns is-mobile">
		@if(!Request::is('login'))
		<div id="sidebar" class="column is-2-desktop is-3-tablet has-background-white">
			@include('_sidebar')
		</div>
		@endif
		<div class="column">
			<div class="box">
				@yield('body')
			</div>
		</div>
	</div>

	@include('_scripts')
	@yield('scripts')
</body>
</html>