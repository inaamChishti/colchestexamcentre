@extends('layouts.admin')

@section('title', 'Edit course')
@section('kicker', 'Tuition')
@section('heading', 'Edit course')

@section('content')
<div class="page-title-row">
    <div>
        <h2>{{ $course->title }}</h2>
        <p>Update the course details shown on the public website.</p>
    </div>
    <div style="display:flex;gap:0.5rem;flex-wrap:wrap;">
        <a href="{{ route('tuition.centre', ['course' => $course->title]) }}#enquire" target="_blank" rel="noopener" class="btn-admin btn-admin--ghost">View on site</a>
        <a href="{{ route('admin.courses.index') }}" class="btn-admin btn-admin--ghost">&larr; Back to courses</a>
    </div>
</div>

@include('admin.courses._form')
@endsection
