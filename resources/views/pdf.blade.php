<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $course->courseCode }}</title>
	<link rel="shortcut icon" href="{{ asset('img/SyMakerLogo.PNG') }}">
	<link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
	<style>
		body {
			font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
		}

		p {
			text-indent: 50px;
		}

		.subtitle {
			color: black;
			font-weight: bold;
		}

		.page-break {
			page-break-after: always;
		}
	</style>
</head>
<body class="is-size-6" style="margin:30px; font-size:10px">
	<div>
		<figure class="image is-64x64" style="margin:auto;">
			<img src="{{ asset('img/uelogobw.gif') }}" alt="UE Logo">
		</figure>
	</div>
	<div class="has-text-centered subtitle is-5">UNIVERSITY OF THE EAST</div>
	<div class="subtitle is-4 mt-5">UNVERSITY MISSION STATEMENT:</div>
	<p>{{ $umission }}</p>
	<div class="subtitle is-4 mt-5">UNIVERSITY VISION STATEMENT:</div>
	<p>{{ $uvision }}</p>
	<div class="subtitle is-4 mt-5">CORE VALUES:</div>
	<p>{{ $core }}</p>
	<div class="subtitle is-4 mt-5">GUIDING PRINCIPLES:</div>
	<p class="has-text-danger">Guiding principles</p>
	<div class="subtitle is-4 mt-5">INSTITUTIONAL OUTCOMES:</div>
	<p class="has-text-danger">Institutional outcomes</p>
	<div class="subtitle is-4 mt-5">COLLEGE MISSION STATEMENT:</div>
	<p class="has-text-danger">College mission</p>
	<div class="subtitle is-4 mt-5">COLLEGE VISION STATEMENT:</div>
	<p class="has-text-danger">College vision</p>
	<div class="subtitle is-4 mt-5">COLLEGE GOALS:</div>
	<p class="has-text-danger">College goals</p>
	<div class="subtitle is-4 mt-5">PROGRAM EDUCATIONAL OBJECTIVES:</div>
	<p class="has-text-danger">Program educational objectives</p>
	<div class="subtitle is-4 mt-5">PROGRAM OUTCOMES:</div>
	<p class="has-text-danger">POrogram outcomes</p>
	<div class="page-break"></div>
	<div class="has-text-centered">Mapping of Learning Outcomes vis-a-vis Course Outcomes</div>
	<div class="table-container">
		<table class="table is-bordered is-striped is-fullwidth">
			<thead>
				<tr>
					<th rowspan="2">Learning Outcomes</th>
					<th colspan="4">Course Outcomes</th>
				</tr>
				<tr>
					<th>C01</th>
					<th>C02</th>
					<th>C03</th>
					<th>C04</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="has-text-danger">Sample learning outcomes</td>
					<th>&#10004;</th>
					<th>&#10004;</th>
					<th>&#10004;</th>
					<th>&#10004;</th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="page-break"></div>
	<div class="mt-4">
		<h3 class="subtitle is-5 has-text-centered">COURSE SYLLABUS IN</h3>
		<h3 class="subtitle is-5 has-text-centered is-uppercase">{{ $course->courseTitle }}</h3>
		<h3 class="subtitle is-5 has-text-centered">School Year 2019 - 2020</h3>
	</div>
	<div class="table-container">
		<table class="table is-fullwidth is-bordered">
			<tbody>
				<tr>
					<th>Course Code</th>
					<td colspan="2" class="is-uppercase">{{ $course->courseCode }}</td>
				</tr>
				<tr>
					<th>Course Title</th>
					<td colspan="2" class="is-uppercase">{{ $course->courseTitle }}</td>
				</tr>
				<tr>
					<th rowspan="2">Credit Units</th>
					<th>Lecture</th>
					<td>3</td>
				</tr>
				<tr>
					<th>Laboratory</th>
					<td>0</td>
				</tr>
				<tr>
					<th rowspan="3">Pre-Requisite(s)</th>
					<th>Course Code</th>
					<th>Course Title</th>
				</tr>
				<tr>
					<td class="has-text-danger is-uppercase">AAA 111</td>
					<td class="has-text-danger is-uppercase">Sample Course 1</td>
				</tr>
				<tr>
					<td class="has-text-danger is-uppercase">BBB 222</td>
					<td class="has-text-danger is-uppercase">Sample Course 2 Mahabang mahabang mahaba</td>
				</tr>
				<tr>
					<th colspan="3">Course Description</th>
				</tr>
				<tr>
					<td colspan="3" class="has-text-danger">
						<p>
							Course Description
						</p>
					</td>
				</tr>
				<tr>
					<th colspan="3">Course Outcomes</th>
				</tr>
				<tr>
					<td colspan="3" class="has-text-danger">Course Outcomes</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="page-break"></div>
	<div class="table-container">
		<table class="table is-bordered is-fullwidth">
			<tr>
				<th colspan="6">COURSE CONTENT</th>
			</tr>
			<tr>
				<th>Week</th>
				<th>Hours</th>
				<th>Learning Outcomes</th>
				<th>Topics</th>
				<th>Teaching Learning Activities</th>
				<th>Assessments</th>
			</tr>
			<tr>
				<td>1st</td>
				<td>3</td>
				<td class="has-text-danger">Sample learning outcomes</td>
				<td class="has-text-danger">Sample topics</td>
				<td class="has-text-danger">Sample activities</td>
				<td class="has-text-danger">Sample assessments</td>
			</tr>
		</table>
	</div>
</body>
</html>