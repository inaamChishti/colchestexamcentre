@extends('layouts.app')

@section('title', $content['title'])
@section('meta_description', $content['meta'])

@section('content')
<section class="page-hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container page-hero-grid">
        <div class="page-hero-copy reveal">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <span>Contact Us</span>
            </nav>
            <p class="eyebrow" data-edit-key="hero_eyebrow"><span class="eyebrow-dot"></span>{{ $content['hero_eyebrow'] }}</p>
            <h1 data-edit-key="hero_title">{{ $content['hero_title'] }}</h1>
            <p class="lead" data-edit-key="hero_text" data-edit-type="textarea">{{ $content['hero_text'] }}</p>
            <div class="hero-trust hero-trust--compact">
                <div class="avatar-stack" aria-hidden="true"><span>SR</span><span>JM</span><span>AK</span></div>
                <p><strong>Real people, real answers.</strong><br>We reply within one working day.</p>
            </div>
        </div>
        <div class="page-hero-media reveal">
            <img src="{{ asset($content['hero_image']) }}" alt="The welcoming reception area at Colchester Exam Centre" data-edit-image="hero_image">
            <div class="page-hero-chip">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 17s5-4.4 5-8a5 5 0 1 0-10 0c0 3.6 5 8 5 8Z" stroke="currentColor" stroke-width="1.6"/><circle cx="10" cy="9" r="1.8" stroke="currentColor" stroke-width="1.6"/></svg>
                Central Colchester
            </div>
        </div>
    </div>
</section>

<section class="section section--paper contact-section">
    <div class="container contact-grid">
        <div class="contact-info">
            <div class="info-grid">
                <article class="info-card reveal">
                    <span class="info-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-6.1 7-11a7 7 0 1 0-14 0c0 4.9 7 11 7 11Z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="10" r="2.4" stroke="currentColor" stroke-width="1.6"/></svg>
                    </span>
                    <div>
                        <h3>Visit the centre</h3>
                        <p><span data-edit-key="address_line1">{{ $content['address_line1'] }}</span><br><span data-edit-key="address_line2">{{ $content['address_line2'] }}</span><br><span data-edit-key="city">{{ $content['city'] }}</span> <span data-edit-key="postcode">{{ $content['postcode'] }}</span></p>
                    </div>
                </article>

                <article class="info-card reveal">
                    <span class="info-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.5 3.5h2.2l1.4 4-2 1.4a12 12 0 0 0 5 5l1.4-2 4 1.4v2.2a2 2 0 0 1-2.2 2A15.5 15.5 0 0 1 4.5 5.7a2 2 0 0 1 2-2.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                    </span>
                    <div>
                        <h3>Call us</h3>
                        <p><a href="tel:{{ preg_replace('/\s+/', '', $content['phone']) }}"><span data-edit-key="phone">{{ $content['phone'] }}</span></a><br>Speak to our exams team</p>
                    </div>
                </article>

                <article class="info-card reveal">
                    <span class="info-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5.5" width="17" height="13" rx="2.2" stroke="currentColor" stroke-width="1.6"/><path d="m4.5 7 7.5 5.5L19.5 7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    </span>
                    <div>
                        <h3>Email us</h3>
                        <p><a href="mailto:{{ $content['email'] }}"><span data-edit-key="email">{{ $content['email'] }}</span></a><br>We reply within one working day</p>
                    </div>
                </article>

                <article class="info-card reveal">
                    <span class="info-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="8.4" stroke="currentColor" stroke-width="1.6"/><path d="M12 7.2V12l3.2 1.9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    </span>
                    <div>
                        <h3>Opening hours</h3>
                        <p><span data-edit-key="hours_weekday">{{ $content['hours_weekday'] }}</span><br><span data-edit-key="hours_saturday">{{ $content['hours_saturday'] }}</span><br><span data-edit-key="hours_sunday">{{ $content['hours_sunday'] }}</span></p>
                    </div>
                </article>
            </div>

            <div class="map-card reveal">
                <iframe
                    title="Map showing Colchester Exam Centre"
                    src="https://www.google.com/maps?q={{ urlencode($content['map_query']) }}&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map-foot">
                    <div>
                        <strong>Free parking nearby</strong>
                        <span>Easy access by bus, train and car.</span>
                    </div>
                    <span class="map-pill">CO1 postcode</span>
                </div>
            </div>
        </div>

        <div class="form-card reveal" id="enquire">
            <p class="eyebrow"><span class="eyebrow-dot"></span>Send a message</p>
            <h2>How can we help?</h2>
            <p class="form-intro">Whether it is an exam entry, a tuition course or a quick question, tell us what you need and we will point you in the right direction.</p>

            @include('partials.enquiry-form', ['source' => 'contact'])

            <div class="form-assurance">
                <span>
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 2.8 16 5.4v4.8c0 3.8-2.4 6.5-6 7.5-3.6-1-6-3.7-6-7.5V5.4L10 2.8Z" stroke="currentColor" stroke-width="1.5"/><path d="m7.4 9.8 1.8 1.8 3.5-3.6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Your information stays private
                </span>
                <span>
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="7.2" stroke="currentColor" stroke-width="1.5"/><path d="M10 6v4l2.6 1.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    Replies within one working day
                </span>
            </div>
        </div>
    </div>
</section>
@endsection
