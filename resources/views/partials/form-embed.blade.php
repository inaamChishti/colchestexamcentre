@php
    $content = $content ?? \App\Support\SiteContent::get('form');
@endphp

<div class="form-embed-placeholder">
    <span class="form-embed-icon" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none"><path d="M7 3.5h7l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 6 20V5a1.5 1.5 0 0 1 1-1.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M14 3.5V8h4M9 12h6M9 15h6M9 18h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </span>
    <h3 data-edit-key="form_placeholder_title">{{ $content['form_placeholder_title'] }}</h3>
    <p data-edit-key="form_placeholder_text" data-edit-type="textarea">{{ $content['form_placeholder_text'] }}</p>
    <a href="{{ route('contact.us') }}" class="btn btn--primary btn--sm"><span data-edit-key="form_placeholder_button">{{ $content['form_placeholder_button'] }}</span></a>
</div>
