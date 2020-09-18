@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/colleges.css') }}">
@endsection

@section('body')
{{-- Subtitle & Search Bar --}}
<div id="header" class="columns">
  <div class="column is-5-tablet is-4-widescreen">
    <div class="subtitle is-3">Colleges</div>
  </div>
  <div class="column">
    <form class="is-inline-block">
      <div class="field has-addons">
        <div id="search" class="control">
          <input type="text" class="input" placeholder="Search college or abbreviation...">
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

{{-- table --}}
<div class="table-container">
  <table class="table is-fullwidth is-striped" id="collegestable">
    <thead>
      <tr>
          <th>CollegeID</th>
        <th>Abbrev.</th>
        <th>Name</th>
        <th>Color Code</th>
        <th>
          <button class="button is-info is-fullwidth" title="Add College" id="addBtn">
            <span class="icon is-small"><i class="fas fa-plus"></i></span>Add College
          </button>
        </th>
      </tr>
    </thead>
    <tbody>
    @foreach($table as $rows)
      <tr>
          <td>{{$rows->collegeID}}</td>
        <td>{{$rows->abbrev}}</td>
        <td>{{$rows->collegeName}}</td>
        <td>
          <span style="color: {{$rows->colorCode}}">{{$rows->colorCode}}</span>
        </td>
        <td>
          <div class="buttons is-right">
            <button class="button edit"><span class="icon"><i class="fas fa-edit"></i></span></button>
            <button class="button is-danger is-inverted delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
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
    <form method="POST" enctype="multipart/form-data" action="{{action('CollegesController@store')}}" >
        @csrf
        <div class="modal-content">
            <div class="box">
                <h1>Abbrev</h1>
                <input type="text"  class="input" name="abbrev" placeholder="Enter College Abbreviation" required>
                <h1>College Name</h1>
                <input type="text"  class="input" name="collegeName" placeholder="Enter College Name" required>
                <h1>Color Code</h1>
                <input type="text"  class="input" name="colorCode" placeholder="Enter Color Code" required>
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
            <form action="colleges" enctype="multipart/form-data" method="POST" id="editForm">
                @csrf
                {{ method_field('PUT') }}
                <h1>Abbrev</h1>
                <input type="text"  class="input" id="abbrev" name="abbrev">
                <h1>College Name</h1>
                <input type="text"  class="input" id="collegeName" name="collegeName">
                <h1>Color Code</h1>
                <input type="text"  class="input" id="colorCode" name="colorCode">
                <button id="save">Save</button>
            </form>
        </div>
    </div>>
    <button class="modal-close is-large" aria-label="close" id="closeButton"></button>
</div>
{{--Delete Modal--}}
<div id="deleteModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <form method="POST" enctype="multipart/form-data" action="/colleges" id="deleteForm">
        @csrf
        {{ method_field('DELETE') }}
        <div class="modal-content">
            <div class="box">
                <h1>Are you sure to delete this row</h1>
                <button type="submit">Yes</button>
            </div>
        </div>
    </form>
    <button class="modal-close is-large" aria-label="close" id="closeButton"></button>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/colleges.js') }}"></script>
@endsection
