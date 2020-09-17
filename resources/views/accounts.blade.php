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
  <table class="table is-fullwidth" id="accountstable">
      <thead>
      <tr>
          <th>ID</th>
          <th>College</th>
          <th>Username</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Initial</th>
          <th>Email</th>
          <th>
              <div class="buttons is-right">
                  <button class="button is-info is-fullwidth" id="addBtn"><span class="icon"><i class="fas fa-plus"></i></span>Add Account</button>
              </div>
          </th>
      </tr>
      </thead>
      <tbody>
      @foreach($table as $row)
          <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->college}}</td>
              <td>{{$row->username}}</td>
              <td>{{$row->lastName}}</td>
              <td>{{$row->firstName}}</td>
              <td>{{$row->middleInitial}}</td>
              <td>{{$row->email}}</td>
              <td>
                  <div class="buttons is-right">
                      <button class="button edit" title="Edit">
                          <span class="icon"><i class="icon fas fa-user-edit"></i></span>
                      </button>
                      <button class="button is-danger is-inverted delete" title="Delete">
                          <span class="icon"><i class="icon fas fa-user-times"></i></span>
                      </button>
                  </div>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
</div>
{{--Edit Modal--}}
<div id="editModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="accounts" enctype="multipart/form-data" method="POST" id="editForm">
                @csrf
                {{ method_field('PUT') }}
            <h1>First Name</h1>
            <input type="text"  class="input" id="firstName" name="firstName">
            <h1>Middle Name</h1>
            <input type="text"  class="input" id="middleInitial" name="middleInitial">
            <h1>Last Name</h1>
            <input type="text"  class="input" id="lastName" name="lastName">
                <select name="college" id="college">
                    @foreach($collegeTable as $crow)
                        <option value="{{$crow->abbrev}}">{{$crow->collegeName}}</option>
                    @endforeach
                </select>
            <h1>Username</h1>
            <input type="text"  class="input" id="username" name="username">
            <h1>Password</h1>
            <input type="password"  class="input" id="password" name="password">
            <h1>Email..</h1>
            <input type="text"  class="input" id="email" name="email">
            <button id="save">Save</button>
            </form>
         </div>
    </div>>
    <button class="modal-close is-large" aria-label="close" id="closeButton"></button>
</div>
{{--Add Modal--}}
<div id="addModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <form method="POST" enctype="multipart/form-data" action="{{action('UsersController@store')}}" >
        @csrf
    <div class="modal-content">
        <div class="box">
            <h1>First Name</h1>
            <input type="text"  class="input" name="firstName" placeholder="Enter First Name" required>
            <h1>Middle Name</h1>
            <input type="text"  class="input" name="middleInitial" placeholder="Enter Middle Name" required>
            <h1>Last Name</h1>
            <input type="text"  class="input" name="lastName" placeholder="Enter Last Name" required>
            <h1>College</h1>
            <!--<input type="text"  class="input" name="college" placeholder="Enter Username" required>-->
            <select name="college" id="college">
                @foreach($collegeTable as $crow)
                <option value="{{$crow->abbrev}}">{{$crow->collegeName}}</option>
                @endforeach
            </select>
            <h1>Username</h1>
            <input type="text"  class="input" name="username" placeholder="Enter Username" required>
            <h1>Password</h1>
            <input type="password"  class="input" name="password" placeholder="Password" placeholder="Enter Password" required>
            <h1>Email</h1>
            <input type="text"  class="input" name="email" placeholder="Enter Email" required>
            <button type="submit">Add</button>
            <button id="addCloseBtn" class="close">Close</button>
        </div>
    </div>
    </form>
    <button class="modal-close is-large" aria-label="close" id="closeButton"></button>
</div>
{{--Delete Modal--}}
<div id="deleteModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <form method="POST" enctype="multipart/form-data" action="/account" id="deleteForm">
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
@endsection
