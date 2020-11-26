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
<div id="collegeForm" class="modal">
  <div class="modal-background"></div>
  <form class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"></p>
      <button class="delete" type="button"></button>
    </header>
    <section class="modal-card-body">
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Abbreviation</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" id="abbrev" class="input" name="abbrev" required>
            </div>
            <div class="help has-text-danger"></div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Name</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" id="name" class="input" name="name" required>
            </div>
            <div class="help has-text-danger"></div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Color Code</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="color" id="color" class="input" name="color" required>
            </div>
            <div class="help has-text-danger"></div>
          </div>
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <div class="buttons is-right">
        <button id="cancel" class="button is-danger is-inverted" type="button">Cancel</button>
        <button id="submit" class="button is-success" type="submit"></button>
      </div>
    </footer>
  </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/colleges.js') }}"></script>
@endsection
