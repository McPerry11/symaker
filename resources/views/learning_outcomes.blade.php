@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/learning_outcomes.css') }}">
@endsection

@section('body')
{{-- Use this as a template for your modules, along with the CSS and JS to match style theme. --}}
<h1 class="subtitle is-3">Learning Outcomes</h1>

@endsection

@section('scripts')
<script src="{{ asset('js/learning_outcomes.js') }}"></script>
@endsection