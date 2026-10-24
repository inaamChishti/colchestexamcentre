@extends('layouts.admin')

@section('title', 'Add course')
@section('kicker', 'Tuition')
@section('heading', 'Add course')

@section('content')
<div class="page-title-row">
    <div>
        <h2>New tuition course</h2>
        <p>Add a course to the public Tuition Centre page.</p>
    </div>
    <a href="{{ route('admin.courses.index') }}" class="btn-admin btn-admin--ghost">&larr; Back to courses</a>
</div>

@include('admin.courses._form')
@endsection
