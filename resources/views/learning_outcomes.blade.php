@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/learning_outcomes.css') }}">
@endsection

@section('body')
{{-- Use this as a template for your modules, along with the CSS and JS to match style theme. --}}
<h1 class="subtitle is-3">Learning Outcomes</h1>

<div id="learning-outcomes">
    <h2 class="subtitle is-4">Learning Outcomes</h2>
    <table class="table is-fullwidth is-hoverable">
        <tbody></tbody>
    </table>
    <input data-table-id="learning-outcomes" id="add-outcome" type="text" class="input" placeholder="+ Add an outcome">
    <p class="help is-danger is-hidden">Please complete the input above before adding new rows.</p>
</div>
<br>
<div id="notes">
    <h2 class="subtitle is-4">Notes</h2>
    <table class="table is-fullwidth is-hoverable">
        <tbody></tbody>
    </table>
    <input data-table-id="notes" id="add-note" type="text" class="input" placeholder="+ Add a note">
    <p class="help is-danger is-hidden">Please complete the input above before adding new rows.</p>
</div>

<template id="learning-outcomes-template">
    <tr id="@{{id}}">
        <td class="id">LO@{{id}}</td>
        <td class="description"><input type="text" class="input new"></td>
        <p class="help is-danger is-hidden">Please complete the input above before adding new rows.</p>
        <td>
            <div class="buttons is-right">
                <a class="button submit" data-table-id="learning-outcomes"><span class="icon"><i class="fas fa-check"></i></span></a>
            </div>
        </td>
    </tr>
</template>

<template id="notes-template">
    <tr id="@{{id}}">
        <td class="note"><input type="text" class="input new"></td>
        <p class="help is-danger is-hidden">Please complete the input above before adding new rows.</p>
        <td>
            <div class="buttons is-right">
                <a class="button submit" data-table-id="notes"><span class="icon"><i class="fas fa-check"></i></span></a>
            </div>
        </td>
    </tr>
</template>
@endsection

@section('scripts')
<script src="{{ asset('js/learning_outcomes.js') }}"></script>
<script src="{{ asset('js/mustache.min.js') }}"></script>
<!-- Mustache js templating, used cdn for testing -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script> -->
@endsection
