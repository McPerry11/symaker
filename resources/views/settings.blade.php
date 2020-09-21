@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/settings-switch.css') }}">
<link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endsection

@section('body')
<h1 class="subtitle is-3">Settings</h1>
<div id="settings">
	<!--------------------- NOTIFICATIONS ----------------------->
	<div class="settings-container">
		<h2 class="subtitle is-size-4 is-marginless">Notifications</h2>
		<hr class="settings-hr">
		<!-- Email Notification -->
		<div class="columns is-mobile is-centered is-gapless">
			<div class="column is-narrow">
				<span class="icon is-large"><i class="fas fa-at fa-lg"></i></span>
			</div>
			<div class="column">
				<p class="title is-size-6 is-spaced">Email Notification</p>
				<p class="subtitle is-7 has-text-grey">Once your email is verified, this setting will be turned on by default. Turning this setting off will make SyMaker stop notifying you for updates.</p>
			</div>
			<div class="column is-narrow">
				<input id="emailNotification" type="checkbox" class="switch is-rounded">
				<label for="emailNotification" class="is-pulled-right switch-m-top"></label>
			</div>
		</div>
		{{-- Removed profile settings. Merong sariling module yung profile. --}}
		{{-- Push notifications through browser is too advanced. Need more time para aralin --}}
	</div>

	<!-------------------------------- SECURITY ------------------------------>
	<div class="settings-container">
		<h2 class="subtitle is-size-4 is-marginless">Security</h2>
		<hr class="settings-hr">
		<!-- Change Password -->
		<a class="columns is-mobile is-centered is-gapless has-text-grey-dark">
			<div class="column is-narrow">
				<span class="icon is-large"><i class="fas fa-key fa-lg"></i></span>
			</div>
			<div class="column">
				<p class="title is-size-6 is-spaced">Change Password</p>
				<p class="subtitle is-7 has-text-grey">Secure your SyMaker account by changing your current password.</p>
			</div>
		</a>
	</div>

	<!-------------------------------- PRIVACY ------------------------------>
	<div class="settings-container">
		<h2 class="subtitle is-size-4 is-marginless">Privacy</h2>
		<hr class="settings-hr">
		<!-- Hide Profile -->
		<div class="columns is-mobile is-centered is-gapless">
			<div class="column is-narrow">
				<span class="icon is-large"><i class="fas fa-user-alt-slash fa-lg"></i></span>
			</div>
			<div class="column">
				<p class="title is-size-6 is-spaced">Hide Profile</p>
				<p class="subtitle is-7 has-text-grey">Your profile is visible in <a>ccssrnd.tech/symaker/username</a>. When this setting is enabled, other users won't be able to see your profile.</p>
			</div>
			<div class="column is-narrow">
				<input id="hideProfile" type="checkbox" class="switch is-rounded">
				<label for="hideProfile" class="is-pulled-right switch-m-top"></label>
			</div>
		</div>
	</div>
	<div class="settings-container">
		<h2 class="subtitle is-size-4 is-marginless">About</h2>
		<hr class="settings-hr">
		{{-- About --}}
		<div class="columns is-mobile is-centered is-gapless">
			<div class="column is-narrow">
				<figure class="image is-32x32">
					<img id="about-logo" src="{{ asset('img/SyMakerLogo.PNG') }}" alt="SyMaker Logo">
				</figure>
			</div>
			<div class="column">
				<p class="title is-size-6 is-spaced">SyMaker 2.0</p>
				<p class="subtitle is-7 has-text-grey">SyMaker 2.0 is a revision of the first SyMaker developed by previous R&D Unit team leader, Clive Fuentebella. The Syllabus Maker dubbed as &quot;SyMaker&quot; is a web application developed to promote a paperless environment in the College of Computer Studies and Systems, and soon to the University of the East. It was recently redeveloped by the UE CCSS Research and Development Unit in order to provide a better user interface and user experience with the application of consistent & mobile-friendly layouts, and sleek & modern design.</p>
			</div>
		</div>
		<div class="columns is-mobile is-centered is-gapless">
			<div class="column is-narrow">
				<figure class="image is-32x32">
					<img src="{{ asset('img/RnDLogo.png') }}" alt="UE CCSS R&D Logo">
				</figure>
			</div>
			<div class="column">
				<p class="title is-size-6 is-spaced">Developers</p>
				<p class="subtitle is-7 has-text-grey">The UE CCSS Research and Development Unit System Division redeveloped and redesigned the revisioned Syllabus Maker, dubbed as SyMaker 2.0. The developers: Mack Perry Co, Virgilio Lopez Jr., and Louis Altoveros aimed to provide a suitable design improving the user experience and user interface after reviewing the structure and suggestions from the first SyMaker.</p>
			</div>
		</div>
	</div>
</div>
<div class="help has-text-centered has-text-grey-light">V1.23.6</div>
@endsection

@section('scripts')
<script src="{{ asset('js/settings.js') }}"></script>
@endsection