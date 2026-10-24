@extends('layouts.app')

@section('title', $content['title'])
@section('meta_description', $content['meta'])

@section('content')
<section class="page-hero content-hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container page-hero-grid">
        <div class="page-hero-copy reveal">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <span>Tuition</span>
            </nav>
            <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="hero_eyebrow">{{ $content['hero_eyebrow'] }}</span></p>
            <h1 data-edit-key="hero_title">{{ $content['hero_title'] }}</h1>
            <p class="lead" data-edit-key="hero_text" data-edit-type="textarea">{{ $content['hero_text'] }}</p>

            <ul class="content-hero-points">
                @foreach ($content['hero_points'] as $index => $point)
                    <li>
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <span data-edit-key="hero_points.{{ $index }}">{{ $point }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="hero-actions">
                <a href="{{ route('contact.us') }}" class="btn btn--primary">
                    <span data-edit-key="hero_primary_label">{{ $content['hero_primary_label'] }}</span>
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="{{ route('tuition.centre') }}" class="btn btn--ghost"><span data-edit-key="hero_secondary_label">{{ $content['hero_secondary_label'] }}</span></a>
            </div>
        </div>

        <div class="page-hero-media reveal">
            <img src="{{ asset($content['hero_image']) }}" alt="A focused tuition session at Colchester Exam Centre" data-edit-image="hero_image">
            <div class="page-hero-chip">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 2.8 16 5.4v4.8c0 3.8-2.4 6.5-6 7.5-3.6-1-6-3.7-6-7.5V5.4L10 2.8Z" stroke="currentColor" stroke-width="1.5"/><path d="m7.4 9.8 1.8 1.8 3.5-3.6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span data-edit-key="hero_chip">{{ $content['hero_chip'] }}</span>
            </div>
        </div>
    </div>
</section>

<section class="section section--paper">
    <div class="container split split--reverse">
        <div class="section-copy reveal">
            <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="intro_eyebrow">{{ $content['intro_eyebrow'] }}</span></p>
            <h2 data-edit-key="intro_title">{{ $content['intro_title'] }}</h2>
            <p class="lead" data-edit-key="intro_text" data-edit-type="textarea">{{ $content['intro_text'] }}</p>

            <ul class="feature-list">
                @foreach ($content['benefits'] as $index => $benefit)
                    <li>
                        <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <div><strong data-edit-key="benefits.{{ $index }}.title">{{ $benefit['title'] }}</strong><span data-edit-key="benefits.{{ $index }}.text" data-edit-type="textarea">{{ $benefit['text'] }}</span></div>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('contact.us') }}" class="btn btn--primary"><span data-edit-key="intro_cta_label">{{ $content['intro_cta_label'] }}</span></a>
        </div>

        <div class="image-stack image-stack--tuition reveal">
            <div class="image-stack-main">
                <img src="{{ asset($content['intro_image_main']) }}" alt="Tutor supporting a student with exam preparation" loading="lazy" data-edit-image="intro_image_main">
            </div>
            <div class="image-stack-secondary">
                <img src="{{ asset($content['intro_image_secondary']) }}" alt="A bright tuition room in Colchester" loading="lazy" data-edit-image="intro_image_secondary">
            </div>
            <div class="image-badge">
                <strong data-edit-key="intro_badge_value">{{ $content['intro_badge_value'] }}</strong>
                <span data-edit-key="intro_badge_label">{{ $content['intro_badge_label'] }}</span>
            </div>
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span><span data-edit-key="pathways_eyebrow">{{ $content['pathways_eyebrow'] }}</span></p>
            <h2 data-edit-key="pathways_title">{{ $content['pathways_title'] }}</h2>
            <p class="lead" data-edit-key="pathways_text" data-edit-type="textarea">{{ $content['pathways_text'] }}</p>
        </div>

        <div class="info-card-grid">
            @foreach ($content['pathways'] as $index => $pathway)
                <article class="info-card info-card--content reveal">
                    <div>
                        <span class="info-tag" data-edit-key="pathways.{{ $index }}.tag">{{ $pathway['tag'] }}</span>
                        <h3 data-edit-key="pathways.{{ $index }}.title">{{ $pathway['title'] }}</h3>
                        <p data-edit-key="pathways.{{ $index }}.text" data-edit-type="textarea">{{ $pathway['text'] }}</p>
                        <a href="{{ route($pathway['route']) }}" class="text-link">
                            <span data-edit-key="pathways.{{ $index }}.link">{{ $pathway['link'] }}</span>
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section section--paper">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span><span data-edit-key="approach_eyebrow">{{ $content['approach_eyebrow'] }}</span></p>
            <h2 data-edit-key="approach_title">{{ $content['approach_title'] }}</h2>
        </div>

        <div class="feature-grid">
            @foreach ($content['approach_items'] as $index => $item)
                <article class="feature-card reveal">
                    <span class="feature-card-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 data-edit-key="approach_items.{{ $index }}.title">{{ $item['title'] }}</h3>
                    <p data-edit-key="approach_items.{{ $index }}.text" data-edit-type="textarea">{{ $item['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span><span data-edit-key="steps_eyebrow">{{ $content['steps_eyebrow'] }}</span></p>
            <h2 data-edit-key="steps_title">{{ $content['steps_title'] }}</h2>
        </div>

        <div class="steps">
            @foreach ($content['steps_items'] as $index => $item)
                <article class="step reveal">
                    <span class="step-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 data-edit-key="steps_items.{{ $index }}.title">{{ $item['title'] }}</h3>
                    <p data-edit-key="steps_items.{{ $index }}.text" data-edit-type="textarea">{{ $item['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section section--paper">
    <div class="container content-narrow">
        <div class="section-head reveal">
            <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="faq_eyebrow">{{ $content['faq_eyebrow'] }}</span></p>
            <h2 data-edit-key="faq_title">{{ $content['faq_title'] }}</h2>
        </div>

        <div class="faq-list reveal">
            @foreach ($content['faq_items'] as $index => $item)
                <details {{ $loop->first ? 'open' : '' }}>
                    <summary data-edit-key="faq_items.{{ $index }}.q">{{ $item['q'] }}</summary>
                    <p data-edit-key="faq_items.{{ $index }}.a" data-edit-type="textarea">{{ $item['a'] }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-band reveal">
            <div class="cta-orbs" aria-hidden="true"></div>
            <div class="cta-copy">
                <p class="eyebrow eyebrow--light"><span class="eyebrow-dot"></span><span data-edit-key="cta_eyebrow">{{ $content['cta_eyebrow'] }}</span></p>
                <h2 data-edit-key="cta_title">{{ $content['cta_title'] }}</h2>
                <p data-edit-key="cta_text" data-edit-type="textarea">{{ $content['cta_text'] }}</p>
            </div>
            <div class="cta-actions">
                <a href="{{ route('contact.us') }}" class="btn btn--gold"><span data-edit-key="cta_primary_label">{{ $content['cta_primary_label'] }}</span></a>
                <a href="{{ route('tuition.centre') }}" class="btn btn--outline-light"><span data-edit-key="cta_secondary_label">{{ $content['cta_secondary_label'] }}</span></a>
            </div>
        </div>
    </div>
</section>
@endsection
