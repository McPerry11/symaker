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
    <form id="search">
      <div class="field has-addons">
        <div class="control is-expanded">
          <input type="text" class="input" placeholder="Search college name or abbreviation...">
        </div>
        <div class="control">
          <button class="button is-info" type="submit" title="Search">
            <span><i class="fas fa-search"></i></span>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<div>Results: <span id="results" class="has-text-weight-bold">{{ count($colleges) }}</span></div>
{{-- Collegs Table --}}
<div class="table-container">
  <table class="table is-fullwidth is-striped" id="collegestable">
    <thead>
      <tr>
        <th>Abbrev.</th>
        <th>Name</th>
        <th>Color Code</th>
        <th>
          <div class="buttons is-right">
            <button class="button is-info is-fullwidth" id="add"><span class="icon"><i class="fas fa-plus"></i></span>Add College</button>
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr id="loading" class="is-hidden">
        <td colspan="4" class="has-text-centered">
          <span class="icon">
            <i class="fas fa-spinner fa-spin"></i>
          </span>
          <div>Loading</div>
        </td>
      </tr>
      @if (count($colleges) > 0)
      @foreach ($colleges as $college)
      <tr>
        <td>{{ $college->abbrev }}</td>
        <td>{{ $college->collegeName }}</td>
        <td>
          <div class="tag has-text-white" style="background-color:{{ $college->colorCode }}">
            {{ $college->colorCode }}
          </div>
        </td>
        <td>
          <div class="buttons is-right">
            <button class="button edit" data-id="{{ $college->id }}">
              <span class="icon">
                <i class="fas fa-edit"></i>
              </span>
            </button>
            <button class="button is-danger is-inverted remove" data-id="{{ $college->id }}">
              <span class="icon">
                <i class="fas fa-trash"></i>
              </span>
            </button>
          </div>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td class="has-text-centered" colspan="4">
          <span class="icon">
            <i class="fas fa-info-circle"></i>
          </span>
          <div>No colleges found</div>
        </td>
      </tr>
      @endif
    </tbody>
  </table>
</div>

{{--Edit Modal--}}
{{-- <div id="addModal" class="modal" style="padding-top: 100px">
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
</div> --}}
@endsection

@section('scripts')
<script src="{{ asset('js/colleges.js') }}"></script>
@endsection
