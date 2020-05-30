@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/settings.css') }}">
<link href="{{ asset('css/settings-switch.css') }}" rel="stylesheet">
@endsection

@section('body')
<h1 class="subtitle is-3">Settings</h1>
{{-- each .columns is for 1 setting(consists of icon, label, and switch) --}}
<!--------------------- NOTIFICATIONS ----------------------->
<div id="notifications" class="container settings-container">
	<h2 class="subtitle is-size-4-tablet is-size-6-mobile is-marginless">Notifications</h2>
	<hr class="settings-hr">

<!-- Email Notification -->
	<div id="emailNotif" class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			{{-- .icon is smaller on mobile viewport --}}
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-at"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-at fa-lg"></i></span>
		</div>
		<div class="column">
			{{-- di ko alam pano ittoggle yung switch gamit jquery pag clinick yung setting kaya binalot ko na lang sya sa label hehe --}}
			<a class="title is-size-7-mobile is-size-6-tablet is-spaced">Email Notification</a>
			<p class="subtitle is-7 has-text-grey is-hidden-mobile">Get notifications on your email.</p> <!-- HIDDEN ON MOBILE -->
		</div>
		<div class="column is-narrow">
			{{-- normal sized switch is visible only on tablet and larger --}}
			<input id="switchNormal1" type="checkbox" name="switchNormal1" class="switch is-rounded is-hidden-mobile" checked="checked">
		  	<label for="switchNormal1" class="is-pulled-right is-hidden-mobile switch-m-top">&nbsp;</label>

		  	{{-- small switch is visible only on mobile --}}
			<input id="switchSmall1" type="checkbox" name="switchSmall1" class="switch is-small is-rounded is-hidden-tablet" checked="checked">
		  	<label for="switchSmall1" class="is-pulled-right is-hidden-tablet switch-m-top">&nbsp;</label>
		</div>
	</div>

<!-- Push Notifications -->
	<div id="pushNotif" class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			{{-- .icon is smaller on mobile viewport --}}
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-bell"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-bell fa-lg"></i></span>
		</div>
		<div class="column">
			<a class="title is-size-7-mobile is-size-6-tablet is-spaced">Push Notifications</a>
			<p class="subtitle is-7 has-text-grey is-hidden-mobile">This will allow us to send push notifications to your device.</p>
			
		</div>
		<div class="column is-narrow">
			{{-- normal sized switch is visible only on tablet and larger --}}
			<input id="switchNormal2" type="checkbox" name="switchNormal2" class="switch is-rounded is-hidden-mobile" checked="checked">
		  	<label for="switchNormal2" class="is-pulled-right is-hidden-mobile switch-m-top">&nbsp;</label>

		  	{{-- small switch is visible only on mobile --}}
			<input id="switchSmall2" type="checkbox" name="switchSmall2" class="switch is-small is-rounded is-hidden-tablet" checked="checked">
		  	<label for="switchSmall2" class="is-pulled-right is-hidden-tablet switch-m-top">&nbsp;</label>
		</div>
	</div>
</div>

<!--------------------------- PROFILE -------------------------->
<div id="profile" class="container settings-container">
	<h2 class="subtitle is-size-4-tablet is-size-6-mobile is-marginless">Profile</h2>
	<hr class="settings-hr">

<!-- Edit Username -->
	<div class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			{{-- .icon is smaller on mobile viewport --}}
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-user-edit"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-user-edit fa-lg"></i></span>
		</div>
		<div class="column">
			<a href="#" class="title is-size-7-mobile is-size-6-tablet is-spaced">Edit Username</a>
			<p class="subtitle is-7 has-text-grey is-hidden-mobile">Change your username</p>
		</div>
	</div>

<!-- Edit Photo -->
	<div class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			{{-- .icon is smaller on mobile viewport --}}
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-user-cog"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-user-cog fa-lg"></i></span>
		</div>
		<div class="column">
			<a href="#" class="title is-size-7-mobile is-size-6-tablet is-spaced">Edit Photo</a>
			<p class="subtitle is-7 has-text-grey is-hidden-mobile">Change your profile picture.</p>
		</div>
	</div>
</div>

<!-------------------------------- SECURITY ------------------------------>
<div id="security" class="container settings-container">
	<h2 class="subtitle is-size-4-tablet is-size-6-mobile is-marginless">Security</h2>
	<hr class="settings-hr">

<!-- Change Password -->
	<div class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			{{-- .icon is smaller on mobile viewport --}}
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-key"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-key fa-lg"></i></span>
		</div>
		<div class="column">
			<a href="#" class="title is-size-7-mobile is-size-6-tablet is-spaced">Change Password</a>
			<p class="subtitle is-7 has-text-grey is-hidden-mobile">Change your current password.</p>
		</div>
	</div>
</div>

<!-------------------------------- PRIVACY ------------------------------>
<div id="privacy" class="container settings-container">
	<h2 class="subtitle is-size-4-tablet is-size-6-mobile is-marginless">Privacy</h2>
	<hr class="settings-hr">

<!-- Hide Profile -->
	<div id="hideProfile" class="columns is-mobile is-centered is-gapless">
		<div class="column is-narrow">
			{{-- .icon is smaller on mobile viewport --}}
			<span class="icon is-medium is-hidden-tablet"><i class="fas fa-user-alt-slash"></i></span>
			<span class="icon is-large is-hidden-mobile"><i class="fas fa-user-alt-slash fa-lg"></i></span>
		</div>
		<div class="column">
			<a class="title is-size-7-mobile is-size-6-tablet is-spaced">Hide Profile</a>
			<p class="subtitle is-7 has-text-grey is-hidden-mobile">When enabled, other users won't be able to see you.</p>
		</div>
		<div class="column is-narrow">
			{{-- normal sized switch is visible only on tablet and larger --}}
			<input id="switchNormal3" type="checkbox" name="switchNormal3" class="switch is-rounded is-hidden-mobile" checked="checked">
		  	<label for="switchNormal3" class="is-pulled-right is-hidden-mobile switch-m-top">&nbsp;</label>

		  	{{-- small switch is visible only on mobile --}}
			<input id="switchSmall3" type="checkbox" name="switchSmall3" class="switch is-small is-rounded is-hidden-tablet" checked="checked">
		  	<label for="switchSmall3" class="is-pulled-right is-hidden-tablet switch-m-top">&nbsp;</label>
		</div>
	</div>
</div>
@endsection('body')



@section('scripts')
<script src="{{ asset('js/settings.js') }}"></script>
<!-- <script src="{{ asset('js/settings-switch.js') }}" ></script> -->
@endsection