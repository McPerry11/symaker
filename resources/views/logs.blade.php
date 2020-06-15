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
  <table class="table is-fullwidth is-striped">
    <thead>
      <tr>
        <th>Log #</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1001</td>
        <td>user1 added the course: CIT 1102</td>
      </tr>
      <tr>
        <td>1002</td>
        <td>user2 added a user: user1</td>
      </tr>
    </tbody>
  </table>
</div>
{{-- Pagination is the page navigator when content could be an indefinite amount. --}}
{{-- Use pagination only when data or content could reach to hundreds. So hindi aabot ng infinite amount of scrolling or swiping kapag nagb-browse. --}}
<nav class="pagination is-right">
  <a class="pagination-previous">Previous</a>
  <a class="pagination-next">Next</a>
  <ul class="pagination-list">
    <li><a class="pagination-link">1</a></li>
    <li><a class="pagination-ellipsis">&hellip;</a></li>
    <li><a class="pagination-link">34</a></li>
    <li><a class="pagination-link">35</a></li>
    <li><a class="pagination-link">36</a></li>
    <li><a class="pagination-ellipsis">&hellip;</a></li>
    <li><a class="pagination-link">69</a></li>
  </ul>
</nav>
@endsection

@section('scripts')
<script src="{{ asset('js/logs.js') }}"></script>
@endsection