<!DOCTYPE html>
@if (Request::is('login'))
<html lang="en" style="background-color:#ba0000">
@else
<html lang="en" style="background-color:{{ App\College::select('colorCode')->where('id', Auth::user()->collegeID)->get()[0]['colorCode'] }}">
@endif
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Symaker 2.0</title>
	@include('_styles')
	@yield('styles')
</head>
<body>
	@if (Request::is('login'))
	<div class="pageloader is-active is-bottom-to-top" style="background-color:#ba0000">
		@else
		<div class="pageloader is-active is-bottom-to-top" style="background-color:{{ App\College::select('colorCode')->where('id', Auth::user()->collegeID)->get()[0]['colorCode'] }}">
			@endif
			<div class="title"></div>
		</div>
		@if(!Request::is('login'))
		{{-- #layout is hidden on login module --}}
		@include('_navbar')
		<div id="layout" class="columns is-mobile is-marginless">
			{{-- #sidebar is hidden on mobile viewport --}}
			<div id="sidebar" class="column is-2-desktop is-3-tablet is-hidden-mobile has-background-white">
				@include('_sidebar')
			</div>
			{{-- Content goes in .box --}}
			<div id="body" class="column">
				<div id="content" class="box">
					@yield('body')
				</div>
			</div>
		</div>
		@else
		{{-- This part is for login page only --}}
		@yield('body')
		@endif

		@include('_scripts')
		@yield('scripts')
	</body>
	</html>
