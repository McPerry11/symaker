@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('body')
<div class="columns">
	<div class="column is-5-tablet is-4-widescreen">
		<div class="subtitle is-3">
			Dashboard
		</div>
	</div>
	<div class="column">
		<form class="is-inline-block">
			<div class="field has-addons">
				<div id="search" class="control">
					<input type="text" class="input" placeholder="Search course or username...">
				</div>
				<div class="control">
					<button class="button is-info">
						<span class="icon"><i class="fas fa-search"></i></span>
					</button>
				</div>
			</div>
		</form>
		<a id="filter" class="is-inline-block is-pulled-right"><span class="icon"><i class="fas fa-chevron-down"></i></span></a>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection