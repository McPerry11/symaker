@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')
<div class="columns is-centered is-vcentered is-marginless is-mobile">
	<div class="column is-5-tablet is-4-desktop is-3-widescreen">
		<form class="box" method="POST" action="{{route('post_login')}}">
			@csrf
			<div class="has-text-centered content">
				<h1 class="title has-text-primary">SYMAKER</h1>
			</div>
			{{-- Username --}}
			<div class="field">
				<div class="control has-icons-left">
					<input type="text" class="input" placeholder="Username" name="username" required>
					<span class="icon is-left"><i class="fas fa-user"></i></span>
				</div>
			</div>
			{{-- Password --}}
			<div class="field has-addons is-marginless">
				<p id="pass-control" class="control has-icons-left">
					<input type="password" class="input" placeholder="Password" name="password" required>
					<span class="icon is-left"><i class="fas fa-key"></i></span>
				</p>
				<div class="control">
					<button id="view" class="button has-background-grey-lighter" type="button"><span class="icon"><i class="fas fa-eye"></i></span></button>
				</div>
			</div>
			<a class="has-text-right has-text-dark help">Forgot Password?</a>
			{{-- Login --}}
			<div class="field has-text-centered">
				<button id="login" class="button is-primary" type="submit">LOGIN</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/login.js') }}"></script>
@endsection