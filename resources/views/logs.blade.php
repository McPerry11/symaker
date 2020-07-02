@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logs.css') }}">
@endsection

@section('body')
{{-- Subtitle & Search Bar --}}
<div id="header" class="columns">
  <div class="column is-5-tablet is-4-widescreen">
    <div class="subtitle is-3">Logs</div>
  </div>
  <div class="column">
    <form>
      <div class="field has-addons">
        <div id="search" class="control">
          <input type="text" class="input" placeholder="Search log number or details...">
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
{{-- Logs Table--}}
<div class="table-container">
  <table class="table is-fullwidth">
    <thead>
      <tr>
        <th>Log #</th>
        <th>Details</th>
        <th>Date & Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1001</td>
        <td>user1 added the course: CIT 1102</td>
        <td>6/30/2020 6:09PM</td>
      </tr>
      <tr>
        <td>1002</td>
        <td>user2 added a user: user1</td>
        <td>4/15/2020 7:15AM</td>
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
<script src="{{ asset('js/logs.js') }}"></script>
@endsection