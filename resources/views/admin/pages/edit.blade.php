@extends('layouts.admin')

@section('title', 'Page editor')
@section('kicker', 'Website')
@section('heading', 'Page editor')

@section('content')
@php
    $editorUrl = $liveUrl.'?editor_preview=1';
    $extraFields = [];

    if (array_key_exists('title', $content) && ! str_starts_with($slug, 'blog-')) {
        $extraFields['title'] = [
            'label' => 'Browser and SEO title',
            'help' => 'The title shown in the browser tab and search results.',
            'type' => 'text',
        ];
    }

    if (array_key_exists('meta', $content)) {
        $extraFields['meta'] = [
            'label' => 'Meta description',
            'help' => 'A short description used by search engines and social previews.',
            'type' => 'textarea',
        ];
    }

    if ($slug === 'home') {
        $extraFields['hero_highlight'] = [
            'label' => 'Highlighted word in the main headline',
            'help' => 'This word is styled in gold inside the headline. Leave it blank to remove the highlight.',
            'type' => 'text',
        ];
    }

    if ($slug === 'contact') {
        $extraFields['map_query'] = [
            'label' => 'Google Maps search query',
            'help' => 'The address or place used by the embedded map on the contact page.',
            'type' => 'text',
        ];
    }
@endphp

<div class="page-title-row">
    <div>
        <h2>Edit {{ $pageName }}</h2>
        <p>Click directly on the page below to change text, or click an image to replace it.</p>
    </div>
    <div class="page-title-actions">
        <a href="{{ route('admin.pages.index') }}" class="btn-admin btn-admin--ghost">All pages</a>
        <a href="{{ $liveUrl }}" target="_blank" rel="noopener" class="btn-admin btn-admin--ghost">View live page</a>
    </div>
</div>

<div class="page-picker">
    <label for="page-picker-select">Switch page</label>
    <select id="page-picker-select" onchange="if (this.value) { window.location.href = this.value; }">
        @foreach ($groups as $groupName => $pages)
            <optgroup label="{{ $groupName }}">
                @foreach ($pages as $pageSlug => $name)
                    <option value="{{ route('admin.pages.edit', $pageSlug) }}" @selected($pageSlug === $slug)>{{ $name }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>

@if ($errors->any())
    <div class="admin-alert admin-alert--error" style="margin-bottom:1rem;">
        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.6"/><path d="M10 6v4.5M10 13.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        <span>{{ $errors->first() }}</span>
    </div>
@endif

<form id="page-editor-form" class="visual-editor" method="POST" action="{{ route('admin.pages.update', $slug) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="visual-editor-toolbar">
        <div class="visual-editor-status">
            <span class="editor-status-dot" data-editor-dot></span>
            <div>
                <strong>Visual editor</strong>
                <span data-editor-status>Loading page preview&hellip;</span>
            </div>
        </div>
        <div class="visual-editor-actions">
            <button type="button" class="btn-admin btn-admin--ghost" data-editor-reload>Reload preview</button>
            <button type="submit" class="btn-admin btn-admin--primary" data-editor-save disabled>Save changes</button>
        </div>
    </div>

    <div class="visual-editor-hint">
        <span>Blue outlines are editable text. Click an image to choose a replacement. Links are disabled inside the preview.</span>
        <a href="{{ $liveUrl }}" target="_blank" rel="noopener">Open live page &rarr;</a>
    </div>

    <div class="visual-editor-stage">
        <div class="visual-editor-loading" data-editor-loading>Loading page preview&hellip;</div>
        <iframe
            src="{{ $editorUrl }}"
            title="{{ $pageName }} visual preview"
            class="visual-editor-frame"
            data-editor-frame></iframe>
    </div>

    @if ($extraFields)
        <div class="form-panel visual-editor-extra">
            <p class="form-section-title">Page settings</p>
            <p class="visual-editor-extra-note">These settings are not shown as editable text on the preview.</p>

            @foreach ($extraFields as $key => $field)
                <div class="admin-field">
                    <label for="field-{{ $key }}">{{ $field['label'] }}</label>
                    @if (($field['type'] ?? 'text') === 'textarea')
                        <textarea id="field-{{ $key }}" name="page_fields[{{ $key }}]" rows="3">{{ old('page_fields.'.$key, $content[$key] ?? '') }}</textarea>
                    @else
                        <input id="field-{{ $key }}" type="text" name="page_fields[{{ $key }}]" value="{{ old('page_fields.'.$key, $content[$key] ?? '') }}">
                    @endif
                    <span class="visual-editor-extra-help">{{ $field['help'] }}</span>
                    @error('page_fields.'.$key)<span class="field-error-admin">{{ $message }}</span>@enderror
                </div>
            @endforeach
        </div>
    @endif

    <div class="visual-editor-foot">
        <p>Changes go live immediately after saving. Unsaved edits are lost if you leave this page.</p>
        <button type="submit" class="btn-admin btn-admin--primary" data-editor-save disabled>Save changes</button>
    </div>

    <div data-editor-fields></div>
</form>
@endsection

@push('scripts')
<script src="{{ asset('js/page-editor.js') }}?v=1.2" defer></script>
@endpush
