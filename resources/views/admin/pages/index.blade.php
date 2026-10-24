@extends('layouts.admin')

@section('title', 'Website pages')
@section('kicker', 'Website')
@section('heading', 'Website pages')

@section('content')
<div class="page-title-row">
    <div>
        <h2>All editable pages</h2>
        <p>Choose any page to edit its text and images in the same visual editor used for the home page.</p>
    </div>
    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn-admin btn-admin--ghost">View website</a>
</div>

@foreach ($groups as $groupName => $pages)
    <section class="panel page-admin-panel">
        <div class="panel-head">
            <h2>{{ $groupName }}</h2>
            <span class="page-admin-count">{{ count($pages) }} {{ \Illuminate\Support\Str::plural('page', count($pages)) }}</span>
        </div>
        <div class="panel-body">
            <div class="page-admin-grid">
                @foreach ($pages as $slug => $name)
                    <a href="{{ route('admin.pages.edit', $slug) }}" class="page-admin-card">
                        <span class="page-admin-icon">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="3.5" width="16" height="17" rx="2.2" stroke="currentColor" stroke-width="1.6"/><path d="M8 8h8M8 12h8M8 16h5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </span>
                        <span class="page-admin-copy">
                            <strong>{{ $name }}</strong>
                            <span>Edit text, images and settings</span>
                        </span>
                        <svg class="page-admin-arrow" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endforeach
@endsection
