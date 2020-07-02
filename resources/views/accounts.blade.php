@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/accounts.css') }}">
@endsection

@section('body')
{{-- Subtitle & Search Bar --}}
<div id="header" class="columns">
  <div class="column is-5-tablet is-4-widescreen">
    <div class="subtitle is-3">Accounts</div>
  </div>
  <div class="column">
    <form>
      <div class="field has-addons">
        <div id="search" class="control">
          <input type="text" class="input" placeholder="Search name or username...">
        </div>
        <div class="control">
          <button class="button is-info" title="Search">
            <span><i class="fas fa-search"></i></span>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
{{-- Accounts Table --}}
<div class="table-container">
  <table class="table is-fullwidth">
    <thead>
      <tr>
        <th>College</th>
        <th>Username</th>
        <th>Name</th>
        <th>
          <button class="button is-info is-pulled-right">
            <span class="icon"><i class="fas fa-plus"></i></span>Add Account
          </button>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>CCSS</td>
        <td>User1</td>
        <td>Last Name, First Name M.I.</td>
        <td>
          <div class="buttons is-right">
            <button class="button">
              <span class="icon"><i class="icon fas fa-user-edit"></i></span>
            </button>
            <button class="button is-danger is-inverted">
              <span class="icon"><i class="icon fas fa-user-times"></i></span>
            </button>
          </div>
        </td>
      </tr>
      <tr>
        <td>CAS</td>
        <td>User2</td>
        <td>Last Name, First Name M.I.</td>
        <td>
          <div class="buttons is-right">
            <button class="button">
              <span class="icon"><i class="icon fas fa-user-edit"></i></span>
            </button>
            <button class="button is-danger is-inverted">
              <span class="icon"><i class="icon fas fa-user-times"></i></span>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
{{-- Pagination --}}
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
<script src="{{ asset('js/accounts.js') }}"></script>
@endsection
