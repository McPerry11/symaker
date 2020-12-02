@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/course_information.css') }}">
@endsection

@section('body')
    <form id="Forms">
        @csrf
	<h1 class="subtitle is-3">Course Information</h1>

	<div class="columns is-hidden-touch mb-0">
		<div class="column is-9">
			<h2 class="subtitle is-5">Course Info</h2>
		</div>
		<div class="column">
			<h2 class="subtitle is-5">Credit Units</h2>
		</div>
	</div>

	<div class="columns is-desktop">
		<div class="column is-9-desktop">
			<h2 class="subtitle is-5 is-hidden-desktop">Course Info</h2>
			<div class="field is-horizontal">
				<div class="field-body">
					<div id="courseCode" class="field">
						<p class="control">
							<label class="label">Course Code</label>
                            <input class="input" id="courseID" name="courseID" value=" {{$course->courseCode}}" placeholder="{{$course->courseCode}}" readonly>
						</p>
					</div>
					<div class="field">
						<p class="control">
							<label class="label">Course Title</label>
                            <input type="text" class="input" id="courseTitle" name="courseTitle" value=" {{$course->courseTitle}}" placeholder="{{$course->courseTitle}}" readonly>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="column">
			<h2 class="subtitle is-5 is-hidden-desktop">Credit Units</h2>
			<div class="field is-horizontal">
				<div class="field-body">
					<div class="field">
						<p class="control">
							<label class="label">Lecture</label>
							<input type="number" class="input" id="lecture">
						</p>
					</div>
					<div class="field">
						<p class="control">
							<label class="label">Laboratory</label>
							<input type="number" class="input" id="laboratory">
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<h2 class="subtitle is-5">Pre-requisites</h2>
	<div class="field">
		<div class="select is-fullwidth" id="selector">
			<select class=".test1" id="test1">
				<option value="" selected disabled>Select course pre-requisite</option>
				<option value="rem" disabled>Remove pre-requisite</option>
                @foreach($allCourses as $option)
				<option value="{{$option->courseCode}}">{{$option->courseCode}} - {{$option->courseTitle}}</option>
                @endforeach
			</select>
		</div>
	</div>
	<div class="field">
		<p class="control">
			<button id="addPrerequisite" class="button is-light" type="button">
				<span class="icon">
					<i class="fas fa-plus"></i>
				</span>
				<span>Add a pre-requisite</span>
			</button>
		</p>
	</div>

	<h2 class="subtitle is-5">Course Description</h2>
	<div class="field">
		<textarea class="textarea" placeholder="This course aims to..." id="courseDesc"></textarea>
	</div>

	<h2 class="subtitle is-5">Course Outcomes</h2>
	<div class="outcomeField field has-addons" id="courseOutcome">
		<div class="control">
			<button class="button is-static">CO1</button>
		</div>
		<div class="control is-expanded has-icons-right">
			<input class="input" type="text">
			<span class="icon is-right is-hidden-desktop"><i class="fas fa-times"></i></span> <!-- always shows 'x' on touch devices -->
		</div>
	</div>

	<div id="outcomeButtonDiv" class="field">
		<p class="control">
			<button id="addOutcome" class="button is-light" type="button">
				<span class="icon">
					<i class="fas fa-plus"></i>
				</span>
				<span>Add a course outcome</span>
			</button>
		</p>
	</div>
	<button type="submit" hidden></button>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/course_information.js') }}"></script>
	<script>

	</script>
	@endsection
