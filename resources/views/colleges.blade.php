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
  <table class="table is-fullwidth is-striped">
    <thead>
      <tr>
        <th>Abbrev.</th>
        <th>Name</th>
        <th>Color Code</th>
        <th>
          <button class="button is-info is-fullwidth" title="Add College">
            <span class="icon is-small"><i class="fas fa-plus"></i></span>Add College
          </button>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>CCSS</td>
        <td>College of Computer Studies and System</td>
        <td>
          <figure class="image is-16x16 is-inline-block" style="background-color: #27a80d;"></figure>
          <span style="color: #27a80d">#27a80d</span>
        </td>
        <td>
          <div class="buttons is-right">
            <button class="button"><span class="icon"><i class="fas fa-edit"></i></span></button>
            <button class="button is-danger is-inverted"><span class="icon"><i class="fas fa-trash"></i></span></button>
          </div>
        </td>
      </tr>
      <tr>
        <td>CBA</td>
        <td>College of Business Administration</td>
        <td>
          <figure class="image is-16x16 is-inline-block" style="background-color: #ffd143;"></figure>
          <span style="color: #ffd143">#ffd143</span>
        </td>
        <td>
          <div class="buttons is-right">
            <button class="button"><span class="icon"><i class="fas fa-edit"></i></span></button>
            <button class="button is-danger is-inverted"><span class="icon"><i class="fas fa-trash"></i></span></button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/colleges.js') }}"></script>
@endsection