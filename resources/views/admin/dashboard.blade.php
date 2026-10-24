@extends('layouts.admin')

@section('title', 'Dashboard')
@section('kicker', 'Overview')
@section('heading', 'Welcome back, ' . strtok(auth()->user()->name, ' '))

@section('content')
<div class="stats-grid">
    <article class="stat-card">
        <div class="stat-card-head">
            <span>Unread messages</span>
            <span class="stat-card-icon">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="14" rx="2.2" stroke="currentColor" stroke-width="1.6"/><path d="m4.5 6.6 7.5 5.4 7.5-5.4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
            </span>
        </div>
        <strong>{{ $unreadMessages }}</strong>
        <small>Awaiting a reply</small>
    </article>

    <article class="stat-card">
        <div class="stat-card-head">
            <span>Total messages</span>
            <span class="stat-card-icon">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 5.5h15v11h-8.2L7 20v-3.5H4.5v-11Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M8.2 9.2h7.6M8.2 12.4h5.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
            </span>
        </div>
        <strong>{{ $totalMessages }}</strong>
        <small>All contact and tuition enquiries</small>
    </article>

    <article class="stat-card">
        <div class="stat-card-head">
            <span>Live courses</span>
            <span class="stat-card-icon">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 6.2c2.7-.8 5-.2 7.5 1.3v11.2c-2.5-1.5-4.8-2.1-7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M19.5 6.2c-2.7-.8-5-.2-7.5 1.3v11.2c2.5-1.5 4.8-2.1 7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
            </span>
        </div>
        <strong>{{ $activeCourses }}</strong>
        <small>Published to the website</small>
    </article>

    <article class="stat-card">
        <div class="stat-card-head">
            <span>All courses</span>
            <span class="stat-card-icon">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 4 8 3.4-8 3.4-8-3.4L12 4Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m4 11 8 3.4 8-3.4M4 14.8l8 3.4 8-3.4" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
            </span>
        </div>
        <strong>{{ $totalCourses }}</strong>
        <small>Including unpublished</small>
    </article>
</div>

<div class="panel-grid">
    <section class="panel">
        <div class="panel-head">
            <h2>Recent enquiries</h2>
            <a href="{{ route('admin.messages.index') }}" class="text-link-admin">View all</a>
        </div>

        @if ($recentMessages->isEmpty())
            <div class="empty-row">
                <strong>No enquiries yet</strong>
                Messages sent from the website will appear here.
            </div>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Received</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentMessages as $message)
                            <tr>
                                <td>
                                    <div class="cell-title">
                                        <span>
                                            <strong>{{ $message->full_name }}</strong>
                                            <span>{{ $message->email }}</span>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div style="display:flex;flex-direction:column;gap:4px;">
                                        <span>{{ $message->subject ?: 'General enquiry' }}</span>
                                        <span class="badge badge--{{ $message->source }}">{{ $message->source }}</span>
                                    </div>
                                </td>
                                <td>{{ $message->created_at->format('j M, H:i') }}</td>
                                <td style="text-align:right;">
                                    <a href="{{ route('admin.messages.show', $message) }}" class="btn-admin btn-admin--ghost btn-admin--sm">Open</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <div style="display:grid;gap:1.2rem;align-content:start;">
        <section class="panel">
            <div class="panel-head">
                <h2>Quick actions</h2>
            </div>
            <div class="panel-body">
                <div class="quick-grid">
                    <a href="{{ route('admin.courses.create') }}" class="quick-card">
                        <span class="quick-icon">
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 4v12M4 10h12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </span>
                        <span>
                            <strong>Add a course</strong>
                            <span>Publish new tuition</span>
                        </span>
                    </a>
                    <a href="{{ route('admin.messages.index', ['status' => 'new']) }}" class="quick-card">
                        <span class="quick-icon">
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><rect x="3" y="4.5" width="14" height="11" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="m4 6 6 4.4L16 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </span>
                        <span>
                            <strong>Unread inbox</strong>
                            <span>{{ $unreadMessages }} awaiting reply</span>
                        </span>
                    </a>
                    <a href="{{ route('admin.pages.index') }}" class="quick-card">
                        <span class="quick-icon">
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><rect x="3" y="3" width="14" height="14" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M6.5 7h7M6.5 10h7M6.5 13h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </span>
                        <span>
                            <strong>Edit website pages</strong>
                            <span>Text, images and settings</span>
                        </span>
                    </a>
                    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="quick-card">
                        <span class="quick-icon">
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M12 3.5h4.5V8M16 4l-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M15.5 11v3.5a1.5 1.5 0 0 1-1.5 1.5H5.5A1.5 1.5 0 0 1 4 14.5V6a1.5 1.5 0 0 1 1.5-1.5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </span>
                        <span>
                            <strong>View website</strong>
                            <span>Open the public site</span>
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-head">
                <h2>Recently updated courses</h2>
                <a href="{{ route('admin.courses.index') }}" class="text-link-admin">Manage</a>
            </div>
            <div class="panel-body" style="display:grid;gap:0.8rem;">
                @forelse ($recentCourses as $course)
                    <a href="{{ route('admin.courses.edit', $course) }}" class="quick-card" style="align-items:center;">
                        <img class="cell-thumb" src="{{ asset($course->image ?: 'images/study-1.jpg') }}" alt="">
                        <span style="flex:1;">
                            <strong>{{ $course->title }}</strong>
                            <span>{{ $course->level }} · {{ $course->updated_at->diffForHumans() }}</span>
                        </span>
                    </a>
                @empty
                    <p style="font-size:0.8rem;color:var(--muted);">No courses have been added yet.</p>
                @endforelse
            </div>
        </section>
    </div>
</div>
@endsection
