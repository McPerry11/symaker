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
    <table class="table is-fullwidth is-striped">
        <thead>
            <tr>
                <th class="col-short">College</th>
                <th class="col-short">Username</th>
                <th>Name</th>
                <th>
                    <button id="add-user" class="button is-link is-pulled-right">
                        <span class="icon">
                            <i class="fas fa-user-friends"></i>
                        </span>
                        <span>Add Account</span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody id="accounts">
            <tr>
                <td>CCSS</td>
                <td>User1</td>
                <td>Last Name, First Name M.I.</td>
                <td class="is-pulled-right">
                    <button class="edit-user button is-rounded is-primary is-small">
                        <i class="icon fas fa-user-edit"></i>
                    </button>
                    <button class="delete-user button is-rounded is-danger is-outlined is-small">
                        <i class="icon fas fa-user-times"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>CAS</td>
                <td>User2</td>
                <td>Last Name, First Name M.I.</td>
                <td class="is-pulled-right">
                    <button class="edit-user button is-rounded is-primary is-small">
                        <i class="icon fas fa-user-edit"></i>
                    </button>
                    <button class="delete-user button is-rounded is-danger is-outlined is-small">
                        <i class="icon fas fa-user-times"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
{{-- Pagination --}}
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
<script src="{{ asset('js/accounts.js') }}"></script>
@endsection
