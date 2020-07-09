@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/course_information.css') }}">
@endsection

@section('body')
<h1 class="subtitle is-3">Course Information</h1>

<div class="columns">
	<div class="column is-9">
		<h2 class="subtitle is-5">Course Info</h2>
	</div>
	<div class="column">
		<h2 class="subtitle is-5">Credit Units</h2>
	</div>
</div>

<div class="columns">
	<div class="column is-9">
		<div class="field is-horizontal">
			<div class="field-body">
				<div id="courseCode" class="field">
					<p class="control">
						<label class="label">Course Code</label>
						<input type="text" class="input" placeholder="AAA 1101">
					</p>
				</div>
				<div class="field">
					<p class="control">
						<label class="label">Course Title</label>
						<input type="text" class="input" placeholder="">
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field is-horizontal">
			<div class="field-body">
				<div class="field">
					<p class="control">
						<label class="label">Lecture</label>
						<input type="number" class="input">
					</p>
				</div>
				<div class="field">
					<p class="control">
						<label class="label">Laboratory</label>
						<input type="number" class="input">
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="field">
	<h2 class="subtitle is-5">Pre-requisites</h2>
</div>
<div id="prerequisiteField" class="field">
	<div class="control has-icons-right">
		<input type="text" class="input" placeholder="BBB 1101 - Computer Programming">
		<span class="icon is-right is-hidden"><i class="fas fa-times"></i></span>
	</div>
</div>
<div class="field">
	<p class="control">
		<button id="addPrerequisite" class="button is-light">
			<span class="icon">
				<i class="fas fa-plus"></i>
			</span>
			<span>Add a pre-requisite</span>
		</button>
	</p>
</div>

<div class="field">
	<h2 class="subtitle is-5">Course Description</h2>
</div>
<div class="field">
	<textarea class="textarea" placeholder="This course aims to..."></textarea>
</div>

<div class="field">
	<h2 class="subtitle is-5">Course Outcomes</h2>
</div>

<div class="outcomeField field has-addons">
	<div class="control">
		<button class="button is-static">CO1</button>
	</div>
	<div class="control is-expanded has-icons-right">
		<input class="input" type="text">
		<span class="icon is-right is-hidden"><i class="fas fa-times"></i></span>
	</div>
</div>

<div id="outcomeButtonDiv" class="field">
	<p class="control">
		<button id="addOutcome" class="button is-light">
			<span class="icon">
				<i class="fas fa-plus"></i>
			</span>
			<span>Add a course outcome</span>
		</button>
	</p>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/course_information.js') }}"></script>
@endsection