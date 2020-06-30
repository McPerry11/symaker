@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
@endsection

@section('body')
{{-- Subtitle & Search Bar --}}
<div id="header" class="columns">
	<div class="column is-5-tablet is-4-widescreen">
		<div class="subtitle is-3">Courses</div>
	</div>
	<div class="column">
		<form>
			<div class="field has-addons">
				<div id="search" class="control">
					<input type="text" class="input" placeholder="Search subject code or description...">
				</div>
				<div class="control">
					<button class="button is-info" title="Search">
						<span class="icon"><i class="fas fa-search"></i></span>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
{{-- Courses Table--}}
<div class="table-container">
	<table class="table is-fullwidth">
		<thead>
			<tr>
				<th>College</th>
				<th>Subject Code</th>
				<th>Title</th>
				<th><button class="button is-info is-fullwidth"><span class="icon"><i class="fas fa-plus"></i></span>Add Course</button></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>CCSS</td>
				<td>AAA 1101</td>
				<td>Subject Title</td>
				<td>
					<div class="buttons is-right">
						<button class="button" type="button" title="Manage Access"><span class="icon"><i class="fas fa-user-cog"></i></span></button>
						<buttpn class="button" title="View"><span class="icon"><i class="fas fa-eye"></i></span></buttpn>
						<a class="button" title="Edit"><span class="icon"><i class="fas fa-edit"></i></span></a>
						<button class="button is-danger is-inverted" title="Delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
					</div>
				</td>
			</tr>
			<tr>
				<td>CAS</td>
				<td>BBB 2202</td>
				<td>Subject Title</td>
				<td>
					<div class="buttons is-right">
						<button class="button" type="button" title="Manage Access"><span class="icon"><i class="fas fa-user-cog"></i></span></button>
						<buttpn class="button" title="View"><span class="icon"><i class="fas fa-eye"></i></span></buttpn>
						<a class="button" title="Edit"><span class="icon"><i class="fas fa-edit"></i></span></a>
						<button class="button is-danger is-inverted" title="Delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
					</div>
				</td>
			</tr>
			<tr>
				<td>CEduc</td>
				<td>CCC 3303</td>
				<td>Subject Title</td>
				<td>
					<div class="buttons is-right">
						<button class="button" type="button" title="Manage Access"><span class="icon"><i class="fas fa-user-cog"></i></span></button>
						<buttpn class="button" title="View"><span class="icon"><i class="fas fa-eye"></i></span></buttpn>
						<a class="button" title="Edit"><span class="icon"><i class="fas fa-edit"></i></span></a>
						<button class="button is-danger is-inverted" title="Delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
{{-- Pagination is the page navigator when content could be an indefinite amount. --}}
{{-- Use pagination only when data or content could reach to hundreds. So hindi aabot ng infinite amount of scrolling or swiping kapag nagb-browse. --}}
<nav class="pagination is-right">
	<a class="pagination-previous">Previous</a>
	<a class="pagination-next">Next</a>
	<form class="pagination-list">
		<div class="field has-addons">
			<div class="control">
				<button class="button is-info">Go to</button>
			</div>
			<div class="control">
				<input type="number" id="page" class="input" placeholder="Page #">
			</div>
			<div class="control">
				<a class="button is-static">/ 69</a>
			</div>
		</div>
	</form>
</nav>
@endsection

@section('scripts')
<script src="{{ asset('js/courses.js') }}"></script>
@endsection