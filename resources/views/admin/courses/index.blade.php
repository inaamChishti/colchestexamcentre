@extends('layouts.admin')

@section('title', 'Courses')
@section('kicker', 'Tuition')
@section('heading', 'Courses')

@section('content')
<div class="page-title-row">
    <div>
        <h2>Tuition courses</h2>
        <p>Create, edit and publish the courses shown on the Tuition Centre page.</p>
    </div>
    <a href="{{ route('admin.courses.create') }}" class="btn-admin btn-admin--primary">
        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 4v12M4 10h12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        Add course
    </a>
</div>

<div class="toolbar">
    <form method="GET" action="{{ route('admin.courses.index') }}" class="search-form">
        <input type="text" name="q" value="{{ $search }}" placeholder="Search by title or level…" aria-label="Search courses">
        <button type="submit" class="btn-admin btn-admin--ghost btn-admin--sm">Search</button>
        @if ($search !== '')
            <a href="{{ route('admin.courses.index') }}" class="text-link-admin" style="font-size:0.75rem;">Clear</a>
        @endif
    </form>
</div>

<section class="panel">
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Level</th>
                    <th>Duration</th>
                    <th>Fee</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>
                            <div class="cell-title">
                                <img class="cell-thumb" src="{{ asset($course->image ?: 'images/study-1.jpg') }}" alt="">
                                <span>
                                    <strong>{{ $course->title }}</strong>
                                    <span>{{ $course->slug }}</span>
                                </span>
                            </div>
                        </td>
                        <td>{{ $course->level }}</td>
                        <td>{{ $course->duration ?: '—' }}</td>
                        <td>{{ $course->fee ?: 'On request' }}</td>
                        <td>{{ $course->sort_order }}</td>
                        <td>
                            <span class="badge badge--{{ $course->is_active ? 'active' : 'inactive' }}">
                                {{ $course->is_active ? 'Live' : 'Hidden' }}
                            </span>
                        </td>
                        <td>
                            <div class="row-actions" style="justify-content:flex-end;">
                                <a href="{{ route('admin.courses.edit', $course) }}" class="icon-btn" title="Edit course" aria-label="Edit {{ $course->title }}">
                                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M13.4 3.6a1.8 1.8 0 0 1 2.5 2.5l-8 8L5 15l.9-2.9 7.5-8.5Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg>
                                </a>
                                <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" data-confirm="Delete &quot;{{ $course->title }}&quot;? This cannot be undone.">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="icon-btn icon-btn--danger" title="Delete course" aria-label="Delete {{ $course->title }}">
                                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 6h12M8 3.5h4M6 6l.7 10a1.5 1.5 0 0 0 1.5 1.4h3.6A1.5 1.5 0 0 0 13.3 16L14 6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-row">
                                <strong>No courses found</strong>
                                {{ $search !== '' ? 'Try a different search term.' : 'Add your first tuition course to get started.' }}
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($courses->hasPages())
        <div class="pagination-wrap">
            {{ $courses->onEachSide(1)->links('vendor.pagination.admin') }}
        </div>
    @endif
</section>
@endsection
