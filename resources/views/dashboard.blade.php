@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('body')
<div id="header">
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
			<a id="btnfilter" class="is-inline-block is-pulled-right"><span class="icon"><i class="fas fa-chevron-down"></i></span></a>
		</div>
	</div>
	<div id="filter">
		<div class="field is-grouped is-grouped-right">
			<label class="label">Sort by:</label>
			<div class="control has-icons-left">
				<div class="select">
					<select id="sort">
						<option value="code" selected>Subject Code</option>
						<option value="college">College</option>
						<option value="recent">Recent</option>
					</select>
				</div>
				<div class="icon is-left">
					<i class="fas fa-sort"></i>
				</div>
			</div>
			<div id="view" class="control">
				<label class="radio">
					<input type="radio" name="view" checked>
					Grid View
				</label>
				<label class="radio">
					<input type="radio" name="view">
					List View
				</label>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection