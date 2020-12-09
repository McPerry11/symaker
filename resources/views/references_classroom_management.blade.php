@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/references_classroom_management.css') }}">
@endsection

@section('body')
<h1 class="subtitle is-3">References & Classroom Management</h1>
<form id="rcmForm" action='rcmSave' method="POST">
    @csrf
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label has-text-left has-text-left">Textbook</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <textarea class="textarea" rows="2" id="textbook" name="textbook"></textarea>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label has-text-left">Other References</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <textarea class="textarea" rows="3" id="otherReferences" name="otherReferences"></textarea>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label has-text-left">Grading System</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <textarea class="textarea" rows="2" id="gradingSystem" name="gradingSystem"></textarea>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label has-text-left">Course Requirements</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <textarea class="textarea" rows="4" id="courseRequirements" name="courseRequirements"></textarea>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label has-text-left">Classroom Policies (optional)</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <textarea class="textarea" rows="2" id="classroomPolicy" name="classroomPolicy"></textarea>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label has-text-left">Consultation Hours</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <textarea class="textarea" rows="2" id="consultationHours" name="consultationHours"></textarea>
      </div>
    </div>
  </div>
</div>
    <input type="hidden" id="courseCode" name="courseCode" value="{{$course->courseCode}}">
    <button type="submit" hidden></button>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/references_classroom_management.js') }}"></script>
@endsection
