@extends('layouts.admin')

@section('title', 'Message')
@section('kicker', 'Inbox')
@section('heading', 'Message')

@section('content')
<div class="page-title-row">
    <div>
        <h2>{{ $message->subject ?: 'General enquiry' }}</h2>
        <p>Received {{ $message->created_at->format('j F Y \a\t H:i') }} from {{ $message->full_name }}.</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="btn-admin btn-admin--ghost">&larr; Back to inbox</a>
</div>

<div class="message-layout">
    <article class="message-card">
        <div class="message-head">
            <div class="message-head-top">
                <span class="badge badge--{{ $message->source }}">{{ $message->source === 'tuition' ? 'Tuition enquiry' : 'Contact form' }}</span>
                <span class="badge badge--{{ $message->status }}">{{ $message->status }}</span>
            </div>
            <h2>{{ $message->subject ?: 'General enquiry' }}</h2>
            <p>From <strong>{{ $message->full_name }}</strong> &lt;{{ $message->email }}&gt;</p>
        </div>
        <div class="message-body">{{ $message->message }}</div>
    </article>

    <aside style="display:grid;gap:1rem;">
        <section class="message-card">
            <div class="message-meta">
                <div class="meta-item">
                    <span>Full name</span>
                    <strong>{{ $message->full_name }}</strong>
                </div>
                <div class="meta-item">
                    <span>Email</span>
                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                </div>
                @if ($message->phone)
                    <div class="meta-item">
                        <span>Phone</span>
                        <a href="tel:{{ preg_replace('/\s+/', '', $message->phone) }}">{{ $message->phone }}</a>
                    </div>
                @endif
                <div class="meta-item">
                    <span>Received</span>
                    <strong>{{ $message->created_at->format('j M Y, H:i') }}</strong>
                </div>
                <div class="meta-item">
                    <span>Source</span>
                    <strong>{{ $message->source === 'tuition' ? 'Tuition Centre page' : 'Contact Us page' }}</strong>
                </div>

                <div class="meta-divider"></div>

                <div class="meta-item">
                    <span>Update status</span>
                    <form method="POST" action="{{ route('admin.messages.status', $message) }}">
                        @csrf
                        @method('PATCH')
                        <div class="admin-field" style="margin:0.35rem 0 0;">
                            <select name="status" aria-label="Message status">
                                <option value="new" {{ $message->status === 'new' ? 'selected' : '' }}>New</option>
                                <option value="read" {{ $message->status === 'read' ? 'selected' : '' }}>Read</option>
                                <option value="archived" {{ $message->status === 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-admin btn-admin--primary btn-admin--sm btn-admin--block" style="margin-top:0.5rem;">Save status</button>
                    </form>
                </div>

                <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: ' . ($message->subject ?: 'Your enquiry')) }}" class="btn-admin btn-admin--gold btn-admin--block">
                    Reply by email
                </a>

                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" data-confirm="Delete this message permanently?">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-admin btn-admin--danger btn-admin--sm btn-admin--block">Delete message</button>
                </form>
            </div>
        </section>
    </aside>
</div>
@endsection
