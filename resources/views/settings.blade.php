@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/settings.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/debug.css') }}"> -->
@endsection

@section('body')
<!-- add switch button -->

<h1 class="subtitle is-3">Settings</h1>
<div id="notifications" class="container settings-container">
	<h2 class="subtitle is-size-4-tablet is-size-5-mobile is-marginless">Notifications</h2>
	<hr class="settings-hr">

	<div class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			<!-- icon is smaller on mobile viewport  -->
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-at"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-at fa-lg"></i></span>
		</div>
		<div class="column">
			<a href="#" class="title is-6 is-spaced">Email Notification</a>
			<p class="subtitle is-7 has-text-grey">Get notifications on	 your email.</p>
		</div>
	</div>

	<div class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			<!-- icon is smaller on mobile viewport  -->
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-bell"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-bell fa-lg"></i></span>
		</div>
		<div class="column">
			<a href="#" class="title is-6 is-spaced">Push Notifications</a>
			<p class="subtitle is-7 has-text-grey">This will allow us to send push notifications to your device.</p>
		</div>
	</div>
</div>

<div id="security" class="container settings-container">
	<h2 class="subtitle is-size-4-tablet is-size-5-mobile is-marginless">Security</h2>
	<hr class="settings-hr">

	<div class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			<!-- icon is smaller on mobile viewport -->
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-key"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-key fa-lg"></i></span>
		</div>
		<div class="column">
			<a href="#" class="title is-6 is-spaced">Change Password</a>
			<p class="subtitle is-7 has-text-grey">Change your current password.</p>
		</div>
	</div>
</div>

<div id="privacy" class="container settings-container">
	<h2 class="subtitle is-size-4-tablet is-size-5-mobile is-marginless">Privacy</h2>
	<hr class="settings-hr">

	<div class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			<!-- icon is smaller on mobile viewport -->
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-user-alt-slash"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-user-alt-slash fa-lg"></i></span>
		</div>
		<div class="column">
			<a href="#" class="title is-6 is-spaced">Hide Profile</a>
			<p class="subtitle is-7 has-text-grey">When enabled, other users won't be able to see you.</p>
		</div>
	</div>
</div>


@endsection('body')



@section('scripts')
<script src="{{ asset('js/settings.js') }}"></script>
@endsection