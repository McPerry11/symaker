@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/bulma-ribbon.min.css') }}">
@endsection

@section('body')
<div id="nojs" class="has-text-centered">
	<h3 class="subtitle is-3">JavaScript is off</h3>
	<p>Symaker requires JavaScript to fully operate. Turn on JavaScript and try again.</p>
</div>
<div id="js">
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
							<button class="button is-info" title="Search">
								<span class="icon"><i class="fas fa-search"></i></span>
							</button>
						</div>
					</div>
				</form>
				<button id="btnfilter" class="button is-white is-inline-block is-pulled-right" title="Sort/Filter"><span class="icon"><i class="fas fa-chevron-down"></i></span></button>
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
	<div id="tiles" class="columns">
		<div class="column is-4-desktop">
			<div class="box has-ribbon">
				<div class="ribbon is-success">CCSS</div>
				<p class="title">AAA 1101</p>
				<p class="subtitle">Subject Description</p>
				<div class="buttons is-right">
					<button class="button" type="button" title="Manage Access"><span class="icon"><i class="fas fa-users-cog"></i></span></button>
					<a class="button" title="View"><span class="icon"><i class="fas fa-eye"></i></span></a>
					<a class="button" title="Edit"><span class="icon"><i class="fas fa-edit"></i></span></a>
					<button class="button is-danger is-inverted" type="button" title="Delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
				</div>
			</div>
		</div>
		<div class="column is-4-desktop">
			<div class="box has-ribbon">
				<div class="ribbon is-primary">CAS</div>
				<p class="title">BBB 2202</p>
				<p class="subtitle">Subject Description</p>
				<div class="buttons is-right">
					<button class="button" type="button" title="Manage Access"><span class="icon"><i class="fas fa-users-cog"></i></span></button>
					<a class="button" title="View"><span class="icon"><i class="fas fa-eye"></i></span></a>
					<a class="button" title="Edit"><span class="icon"><i class="fas fa-edit"></i></span></a>
					<button class="button is-danger is-inverted" type="button" title="Delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
				</div>
			</div>
		</div>
		<div class="column is-4-desktop">
			<div class="box has-ribbon">
				<div class="ribbon is-link">CEduc</div>
				<p class="title">CCC 3303</p>
				<p class="subtitle">Subject Description More Description Here and There</p>
				<div class="buttons is-right">
					<button class="button" type="button" title="Manage Access"><span class="icon"><i class="fas fa-users-cog"></i></span></button>
					<a class="button" title="View"><span class="icon"><i class="fas fa-eye"></i></span></a>
					<a class="button" title="Edit"><span class="icon"><i class="fas fa-edit"></i></span></a>
					<button class="button is-danger is-inverted" type="button" title="Delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection