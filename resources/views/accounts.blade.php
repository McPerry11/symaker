@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/accounts.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('body')
{{-- Subtitle & Search Bar --}}
<div id="header" class="columns">
  <div class="column is-5-tablet is-4-widescreen">
    <div class="subtitle is-3">Accounts</div>
  </div>
  <div class="column">
    <form id="search">
      <div class="field has-addons">
        <div class="control is-expanded">
          <input type="text" class="input" placeholder="Search name or username...">
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
<div>Results: <span id="results" class="has-text-weight-bold"></span></div>
{{-- Accounts Table --}}
<div class="table-container">
  <table class="table is-fullwidth is-striped" id="accountstable">
    <thead>
      <tr>
        @if (Auth::user()->type == 'SYSTEM_ADMIN')
        <th style="width:80px">College</th>
        @endif
        <th>Username</th>
        <th style="min-width:200px">Name</th>
        <th style="min-width:135px; width:135px">
          <div class="buttons is-right">
            <button class="button is-info is-fullwidth" id="add"><span class="icon"><i class="fas fa-plus"></i></span>Add Account</button>
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr id="loading">
        <td colspan="4" class="has-text-centered">
          <span class="icon">
            <i class="fas fa-spinner fa-spin"></i>
          </span>
          <div>Loading</div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

{{--Edit Modal--}}
<div id="userform" class="modal">
  <div class="modal-background"></div>
  <form class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"></p>
      <button class="delete" type="button"></button>
    </header>
    <section class="modal-card-body">
      @if (Auth::user()->type == 'SYSTEM_ADMIN' || Auth::user()->type == 'COLLEGE_ADMIN')
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Role</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="select is-fullwidth">
              <select id="type" name="type" required>
                <option value="" selected disabled>Select a role</option>
                @if (Auth::user()->type == 'SYSTEM_ADMIN')
                <option value="SYSTEM_ADMIN">System Admin</option>
                @endif
                <option value="COLLEGE_ADMIN">College Admin</option>
                <option value="USER">User</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      @endif
      @if (Auth::user()->type == 'SYSTEM_ADMIN')
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">College</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="select is-fullwidth">
              <select id="college" name="college" required>
                {{-- Options are displayed in AJAX --}}
              </select>
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Full Name</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control is-expanded">
              <input type="text" id="firstName" class="input name" name="firstName" placeholder="First Name" maxlength="50" required>
            </div>
          </div>
          <div id="mifield" class="field">
            <div class="control">
              <input type="text" class="input name" placeholder="M.I." name="middleInitial" maxlength="50">
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <input type="text" id="lastName" class="input name" name="lastName" placeholder="Last Name" maxlength="50" required>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Username</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div id="username-control" class="control is-expanded">
              <input type="text" id="username" class="input" name="username" maxlength="20" minlength="5" required>
              <div class="help">Username must be between 5 to 20 characters with at least 1 alphabetical character</div>
            </div>
          </div>
        </div>
      </div>
      <div id="pass-field" class="field is-horizontal">
        <div class="field-label">
          <label class="label">Password</label>
        </div>
        <div class="field-body">
          <div class="field has-addons">
            <div class="control is-expanded">
              <input type="password" class="input" name="password" minlength="8" required>
              <div class="help">Password must have at least 8 characters</div>
            </div>
            <div class="control">
              <button class="button has-background-grey-lighter" type="button">
                <span class="icon">
                  <i class="fas fa-eye"></i>
                </span>
              </button>
            </div>
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
<script>
  var access = '{{ Auth::user()->type }}';
</script>
<script src="{{ asset('js/accounts.js') }}"></script>
@endsection
