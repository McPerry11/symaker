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
	@yield('body')

	@include('_scripts')
	@yield('scripts')
</body>
</html>