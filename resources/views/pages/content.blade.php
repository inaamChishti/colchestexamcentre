@extends('layouts.app')

@section('title', $content['title'])
@section('meta_description', $content['meta'])

@section('content')
@php
    $isPolicy = in_array($slug, ['privacy-policy', 'terms-of-use', 'cookie-policy'], true);
    $tones = ['paper', 'cream'];
    $blockIndex = 0;
@endphp

<section class="page-hero content-hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container page-hero-grid">
        <div class="page-hero-copy reveal">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <span data-edit-key="name">{{ $content['name'] }}</span>
            </nav>
            <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="eyebrow">{{ $content['eyebrow'] }}</span></p>
            <h1 data-edit-key="hero_title">{{ $content['hero_title'] }}</h1>
            <p class="lead" data-edit-key="hero_text" data-edit-type="textarea">{{ $content['hero_text'] }}</p>

            @if (! empty($content['hero_points']))
                <ul class="content-hero-points">
                    @foreach ($content['hero_points'] as $pointIndex => $point)
                        <li>
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <span data-edit-key="hero_points.{{ $pointIndex }}">{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif

            <div class="hero-actions">
                <a href="{{ route('contact.us') }}" class="btn btn--primary">
                    Ask us a question
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                @unless ($isPolicy)
                    <a href="{{ route('exam.registration') }}" class="btn btn--ghost">Start an exam entry</a>
                @endunless
            </div>
        </div>

        <div class="page-hero-media reveal">
            <img src="{{ asset($content['hero_image']) }}" alt="{{ $content['name'] }} at Colchester Exam Centre" data-edit-image="hero_image">
            <div class="page-hero-chip">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 2.8 16 5.4v4.8c0 3.8-2.4 6.5-6 7.5-3.6-1-6-3.7-6-7.5V5.4L10 2.8Z" stroke="currentColor" stroke-width="1.5"/><path d="m7.4 9.8 1.8 1.8 3.5-3.6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                JCQ-compliant centre
            </div>
        </div>
    </div>
</section>

@foreach ($content['blocks'] as $block)
    @include('partials.content-block', [
        'block' => $block,
        'tone' => $tones[$blockIndex % 2],
        'prefix' => 'blocks.'.$blockIndex,
    ])
    @php $blockIndex++; @endphp
@endforeach

@if (! empty($content['faq']))
    @include('partials.content-block', [
        'block' => array_merge(['type' => 'faq'], $content['faq']),
        'tone' => $tones[$blockIndex % 2],
        'prefix' => 'faq',
    ])
@endif

@if (! empty($content['cta']))
    <section class="cta-section content-cta">
        <div class="container">
            <div class="cta-band reveal">
                <div class="cta-orbs" aria-hidden="true"></div>
                <div class="cta-copy">
                    <p class="eyebrow eyebrow--light"><span class="eyebrow-dot"></span>Next step</p>
                    <h2 data-edit-key="cta.title">{{ $content['cta']['title'] }}</h2>
                    <p data-edit-key="cta.text" data-edit-type="textarea">{{ $content['cta']['text'] }}</p>
                </div>
                <div class="cta-actions">
                    <a href="{{ route($content['cta']['route']) }}" class="btn btn--gold">
                        <span data-edit-key="cta.label">{{ $content['cta']['label'] }}</span>
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection
