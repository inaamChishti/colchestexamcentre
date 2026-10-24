@extends('layouts.app')

@section('title', $content['title'])
@section('meta_description', $content['meta'])

@section('content')
<section class="page-hero form-hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container page-hero-grid">
        <div class="page-hero-copy reveal">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <span>Online Form</span>
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
        </div>

        <aside class="form-hero-card reveal">
            <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="card_eyebrow">{{ $content['card_eyebrow'] }}</span></p>
            <h2 data-edit-key="card_title">{{ $content['card_title'] }}</h2>
            <ul>
                @foreach ($content['card_items'] as $index => $item)
                    <li data-edit-key="card_items.{{ $index }}" data-edit-type="textarea">{{ $item }}</li>
                @endforeach
            </ul>
            <a href="{{ route('contact.us') }}" class="text-link"><span data-edit-key="card_link_label">{{ $content['card_link_label'] }}</span>
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </aside>
    </div>
</section>

<section class="section section--paper">
    <div class="container content-narrow">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span><span data-edit-key="form_eyebrow">{{ $content['form_eyebrow'] }}</span></p>
            <h2 data-edit-key="form_title">{{ $content['form_title'] }}</h2>
            <p class="lead" data-edit-key="form_text" data-edit-type="textarea">{{ $content['form_text'] }}</p>
        </div>

        <div class="form-embed-shell reveal" id="online-form">
            <div class="form-embed-head">
                <div>
                    <span class="form-embed-label" data-edit-key="form_label">{{ $content['form_label'] }}</span>
                    <strong data-edit-key="form_brand">{{ $content['form_brand'] }}</strong>
                </div>
                <span class="form-embed-status">
                    <span aria-hidden="true"></span>
                    <span data-edit-key="form_status">{{ $content['form_status'] }}</span>
                </span>
            </div>
            <div class="form-embed-body">
                @include('partials.form-embed')
            </div>
        </div>

        <p class="form-embed-note reveal"><span data-edit-key="form_note">{{ $content['form_note'] }}</span> Read our <a href="{{ route('privacy.policy') }}">privacy policy</a>.</p>
    </div>
</section>

<section class="section section--cream">
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
                <a href="tel:{{ preg_replace('/\s+/', '', \App\Support\SiteContent::get('contact')['phone']) }}" class="btn btn--outline-light"><span data-edit-key="cta_secondary_label">{{ $content['cta_secondary_label'] }}</span></a>
            </div>
        </div>
    </div>
</section>
@endsection
