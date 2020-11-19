@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/courses.css') }}">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
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
	<table class="table is-fullwidth" id="coursesTable">
		<thead>
			<tr>
				<th>College</th>
				<th>Subject Code</th>
				<th>Title</th>
				<th><button class="button is-info is-fullwidth" id="addCourse"><span class="icon"><i class="fas fa-plus"></i></span>Add Course</button></th>
			</tr>
		</thead>
		<tbody>
        @foreach($joinedTable as $row)
			<tr>
				<td>{{$row->abbrev}}</td>
				<td>{{$row->courseCode}}</td>
				<td>{{$row->courseTitle}}</td>
				<td>
					<div class="buttons is-right">
						<button class="button" type="button" title="Manage Access"><span class="icon"><i class="fas fa-user-cog"></i></span></button>
						<button class="button" title="View"><span class="icon"><i class="fas fa-eye"></i></span></button>
						<a class="button edit" title="Edit"><span class="icon"><i class="fas fa-edit"></i></span></a>
						<button class="button is-danger is-inverted" title="Delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
					</div>
				</td>
			</tr>
        @endforeach
        </tbody>
	</table>
</div>
{{--Add Modal--}}
<div id="addModal" class="modal" style="padding-top: 100px">
  <div class="modal-background"></div>
  <form method="POST" enctype="multipart/form-data" action="{{action('CoursesController@store')}}">
    @csrf
    <div class="modal-content">
      <div class="box">
          <div><h1 style="font-size: 50px;">Add Courses</h1></div>
        <h1>Course Code</h1>
        <input type="text"  class="input" name="courseCode" placeholder="Enter " required>
          <h1>College</h1>
          <select name="collegeID" id="collegeID">
              @foreach($collegeTable as $crow)
                  <option value="{{$crow->id}}">{{$crow->abbrev}}</option>
              @endforeach
          </select>
          <h1>Course Title</h1>
          <input type="text"  class="input" name="courseTitle" placeholder="Enter " required>
        <button type="submit">Add</button>
        <button id="addCloseBtn" class="close">Close</button>
      </div>
    </div>
  </form>
  <button class="modal-close is-large" aria-label="close" id="closeButton"></button>
</div>
{{--Edit Modal--}}
<div id="editModal" class="modal" style="padding-top: 100px">
  <div class="modal-background"></div>
  <div class="modal-content">
    <div class="box">
      <form action="courses" enctype="multipart/form-data" method="POST" id="editForm">
        @csrf
        {{ method_field('PUT') }}
          <div><h1 style="font-size: 50px;">Edit Course</h1></div>
          <h1>Course Code</h1>
          <input type="text"  class="input" id="courseCode" name="courseCode" placeholder="Enter " required>
          <h1>College</h1>
          <select name="collegeID" id="collegeID">
              @foreach($collegeTable as $crow)
                  <option value="{{$crow->id}}">{{$crow->abbrev}}</option>
              @endforeach
          </select>
          <h1>Course Title</h1>
          <input type="text"  class="input" id="courseTitle" name="courseTitle" placeholder="Enter " required>
        <button id="save">Save</button>
      </form>
    </div>
  </div>>
  <button class="modal-close is-large" aria-label="close" id="closeButton"></button>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
    var addModal = document.getElementById('addModal')
    var editModal = document.getElementById('editModal')
    $('#addCourse').click(function (){
        addModal.style.display = 'block';
    });
    $('.edit').click(function (){
        editModal.style.display = 'block'
    });
    $(document).ready(function (){

        var table = $('#coursesTable').DataTable();

        table.on('click','.edit', function(){

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr = $tr.prev('parent');
            }

            var data = table.row($tr).data();
            console.log(data);
            $('#courseCode').val(data[1]);
            $('#CollegeID').val(data[0]);
            $('#courseTitle').val(data[2]);

            $('#editForm').attr('action','/courses/'+data[1]);
            $('#editModal').style.display='block';
        });
    });
</script>
@endsection
