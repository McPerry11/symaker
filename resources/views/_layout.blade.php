<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Symaker 2.0</title>
	@include('_styles')
	@yield('styles')
</head>
<body>
	@if(!Request::is('login'))
	{{-- #layout is hidden on login module --}}
	<div id="layout" class="columns is-mobile is-marginless">
		@include('_navbar')
		{{-- #sidebar is hidden on mobile viewport --}}
		<div id="sidebar" class="column is-2-desktop is-3-tablet has-background-white">
			@include('_sidebar')
		</div>
		{{-- Content goes in .box --}}
		<div class="column">
			<div class="box">
				@yield('body')
			</div>
		</div>
	</div>
	@endif

	@include('_scripts')
	@yield('scripts')
</body>
</html>