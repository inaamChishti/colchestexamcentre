@extends('layouts.admin')

@section('title', 'Messages')
@section('kicker', 'Inbox')
@section('heading', 'Messages')

@section('content')
<div class="page-title-row">
    <div>
        <h2>Enquiries</h2>
        <p>Messages sent through the contact and tuition enquiry forms.</p>
    </div>
    @if ($unreadCount > 0)
        <span class="badge badge--new">{{ $unreadCount }} unread</span>
    @endif
</div>

<div class="toolbar">
    <form method="GET" action="{{ route('admin.messages.index') }}" class="search-form" style="flex-wrap:wrap;">
        <input type="text" name="q" value="{{ $search }}" placeholder="Search name, email or subject…" aria-label="Search messages">

        <select name="status" class="select-input" aria-label="Filter by status">
            <option value="">All statuses</option>
            <option value="new" {{ $status === 'new' ? 'selected' : '' }}>New</option>
            <option value="read" {{ $status === 'read' ? 'selected' : '' }}>Read</option>
            <option value="archived" {{ $status === 'archived' ? 'selected' : '' }}>Archived</option>
        </select>

        <select name="source" class="select-input" aria-label="Filter by source">
            <option value="">All sources</option>
            <option value="contact" {{ $source === 'contact' ? 'selected' : '' }}>Contact form</option>
            <option value="tuition" {{ $source === 'tuition' ? 'selected' : '' }}>Tuition enquiry</option>
        </select>

        <button type="submit" class="btn-admin btn-admin--ghost btn-admin--sm">Filter</button>

        @if ($search !== '' || $status !== '' || $source !== '')
            <a href="{{ route('admin.messages.index') }}" class="text-link-admin" style="font-size:0.75rem;">Reset</a>
        @endif
    </form>
</div>

<section class="panel">
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Source</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <td>
                            <div class="cell-title">
                                <span>
                                    <strong>{{ $message->full_name }}</strong>
                                    <span>{{ $message->email }}</span>
                                </span>
                            </div>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($message->subject ?: 'General enquiry', 46) }}</td>
                        <td><span class="badge badge--{{ $message->source }}">{{ $message->source }}</span></td>
                        <td>{{ $message->created_at->format('j M Y, H:i') }}</td>
                        <td><span class="badge badge--{{ $message->status }}">{{ $message->status }}</span></td>
                        <td>
                            <div class="row-actions" style="justify-content:flex-end;">
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn-admin btn-admin--ghost btn-admin--sm">Open</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-row">
                                <strong>No messages found</strong>
                                {{ $search !== '' || $status !== '' || $source !== '' ? 'Try changing or resetting the filters.' : 'New enquiries from the website will appear here.' }}
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($messages->hasPages())
        <div class="pagination-wrap">
            {{ $messages->onEachSide(1)->links('vendor.pagination.admin') }}
        </div>
    @endif
</section>
@endsection
