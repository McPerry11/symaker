@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')
{{-- Subtitle & Search Bar --}}
<nav class="level is-mobile">
    <div class="level-left">
        <div class="level-item">
            <h2 class="title"><strong>Logs</strong></h2>
        </div>
    </div>

    <div class="level-right">
        <div class="level-item">
            <div class="field has-addons">
                <div class="control">
                    <input type="text" class="input" placeholder="Search..." name="search">
                </div>
                <div class="control">
                    <button class="button has-background-grey-lighter">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
{{-- Logs Table--}}
<table class="table is-fullwidth is-hoverable">
    <thead>
        <tr>
            <th id="log-no" style="width: 100px;">Log #</th>
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
@endsection


