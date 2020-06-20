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
                <th class="hidden-mobile">Abbrev.</th> <!-- hidden mobile -->
                <th>Name</th>
                <th class="has-text-centered">Color Code</th>
                <th class="has-text-right">
                    <button id="addCollege" class="button is-small is-success" title="Add College">
                        <span class="icon is-small"><i class="fas fa-plus"></i></span>
                        <p class="hidden-mobile">Add College</p>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="hidden-mobile">CCSS</td> <!-- hidden mobeil -->
                <td>College Of Computer Studies And System</td>
                <td class="has-text-centered">
                    <figure class="image is-16x16 is-inline-block" style="background-color: #27a80d;"></figure>
                </td>
                <td class="has-text-right">
                    <a class="icon" title="Edit"><i class="far fa-edit"></i></a>
                    <a class="icon" title="Delete"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>

            <tr>
                <td class="hidden-mobile">CBA</td> <!-- hidden mobile -->
                <td>College Of Business Administration</td>
                <td class="has-text-centered">
                    <figure class="image is-16x16 is-inline-block" style="background-color: #ffd143;">
                    </figure>
                </td>
                <td class="has-text-right">
                    <a class="icon" title="Edit"><i class="far fa-edit"></i></a>
                    <a class="icon" title="Delete"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/colleges.js') }}"></script>
@endsection