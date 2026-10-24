@extends('layouts.app')

@section('title', $content['title'])
@section('meta_description', $content['meta'])

@section('content')
<section class="tuition-hero">
    <div class="tuition-glow" aria-hidden="true"></div>
    <div class="container tuition-hero-grid">
        <div class="tuition-hero-copy reveal">
            <nav class="breadcrumb breadcrumb--light" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <span>Tuition Centre</span>
            </nav>
            <p class="eyebrow eyebrow--light" data-edit-key="hero_eyebrow"><span class="eyebrow-dot"></span>{{ $content['hero_eyebrow'] }}</p>
            <h1 data-edit-key="hero_title">{{ $content['hero_title'] }}</h1>
            <p class="lead" data-edit-key="hero_text" data-edit-type="textarea">{{ $content['hero_text'] }}</p>

            <div class="hero-actions">
                <a href="#courses" class="btn btn--gold">Browse courses</a>
                <a href="#enquire" class="btn btn--outline-light">Ask a question</a>
            </div>

            <div class="tuition-points">
                <span><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg> Max 8 per group</span>
                <span><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg> Evening &amp; weekend classes</span>
                <span><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg> Examiner-led insight</span>
            </div>
        </div>

        <div class="tuition-hero-visual reveal">
            <div class="tuition-photo">
                <img src="{{ asset($content['hero_image']) }}" alt="A small-group tuition session in Colchester" data-edit-image="hero_image">
            </div>
            <div class="tuition-float tuition-float--top">
                <span class="float-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9.2" cy="8.2" r="3.1" stroke="currentColor" stroke-width="1.6"/><path d="M3.8 19c.5-3 2.6-4.8 5.4-4.8s4.9 1.8 5.4 4.8M16.3 5.7a3 3 0 0 1 0 5.9M17.2 14.6c2 .5 3.3 2.1 3.7 4.4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                </span>
                <div><strong>Small groups</strong><span>Personal feedback, every week</span></div>
            </div>
            <div class="tuition-float tuition-float--bottom">
                <strong>1:1 available</strong>
                <span>Tailored intensive support</span>
            </div>
            <div class="tuition-stamp" aria-hidden="true">
                <span>Grades</span>
                <strong>↑</strong>
                <span>that move</span>
            </div>
        </div>
    </div>
</section>

<section class="section section--paper">
    <div class="container split split--reverse">
        <div class="section-copy reveal">
            <p class="eyebrow"><span class="eyebrow-dot"></span>Why our tuition works</p>
            <h2 data-edit-key="intro_title">{{ $content['intro_title'] }}</h2>
            <p class="lead" data-edit-key="intro_text" data-edit-type="textarea">{{ $content['intro_text'] }}</p>

            <ul class="feature-list">
                <li>
                    <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <div><strong>Subject specialists</strong><span>Experienced teachers and examiners, not general tutors.</span></div>
                </li>
                <li>
                    <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <div><strong>Exam-technique first</strong><span>Every session connects content to how marks are actually awarded.</span></div>
                </li>
                <li>
                    <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <div><strong>Regular progress updates</strong><span>Know what is improving and what to work on next.</span></div>
                </li>
            </ul>

            <div class="fee-note">
                <span class="fee-note-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="6.5" width="17" height="12" rx="2.2" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 10.5h17M7.5 15h3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                </span>
                <p data-edit-key="fee_note" data-edit-type="textarea">{{ $content['fee_note'] }}</p>
            </div>
        </div>

        <div class="image-stack image-stack--tuition reveal">
            <div class="image-stack-main">
                <img src="{{ asset($content['intro_image_main']) }}" alt="A bright tuition room at Colchester Exam Centre" loading="lazy" data-edit-image="intro_image_main">
            </div>
            <div class="image-stack-secondary">
                <img src="{{ asset($content['intro_image_secondary']) }}" alt="Study materials and exam preparation" loading="lazy" data-edit-image="intro_image_secondary">
            </div>
            <div class="image-badge">
                <strong>8</strong>
                <span>Max class<br>size</span>
            </div>
        </div>
    </div>
</section>

<section class="section section--cream" id="courses">
    <div class="container">
        <div class="section-head section-head--split reveal">
            <div>
                <p class="eyebrow"><span class="eyebrow-dot"></span>Courses</p>
                <h2>Find the right course for you.</h2>
            </div>
            <div>
                <p class="lead">Every course is built around the current specification, with exam-style practice from the very first session.</p>
            </div>
        </div>

        <div class="filter-bar reveal" role="group" aria-label="Filter courses by level" data-filter-bar>
            <button type="button" class="chip is-active" data-filter="all">All courses</button>
            <button type="button" class="chip" data-filter="gcse">GCSE</button>
            <button type="button" class="chip" data-filter="igcse">IGCSE</button>
            <button type="button" class="chip" data-filter="a-level">A-Level</button>
            <button type="button" class="chip" data-filter="university">University</button>
            <button type="button" class="chip" data-filter="adult">Adult</button>
        </div>

        <div class="course-grid" data-course-grid>
            @forelse ($courses as $course)
                @include('partials.course-card', ['course' => $course])
            @empty
                <div class="empty-state">
                    <h3>Courses are being updated</h3>
                    <p>Please contact us for the current tuition timetable and availability.</p>
                    <a href="#enquire" class="btn btn--primary">Ask about tuition</a>
                </div>
            @endforelse
        </div>

        <p class="course-filter-empty" data-filter-empty hidden>No courses in this level right now. Try another filter or <a href="#enquire">ask us about a bespoke plan</a>.</p>
    </div>
</section>

<section class="section section--paper">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span>The tuition experience</p>
            <h2>Structured support, without the pressure.</h2>
        </div>

        <div class="benefit-grid">
            <article class="benefit-card reveal">
                <span class="benefit-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 6.2c2.7-.8 5-.2 7.5 1.3v11.2c-2.5-1.5-4.8-2.1-7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M19.5 6.2c-2.7-.8-5-.2-7.5 1.3v11.2c2.5-1.5 4.8-2.1 7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span>
                <h3>Specification-led content</h3>
                <p>We teach the exact syllabus, in the order it makes sense, with no wasted sessions.</p>
            </article>
            <article class="benefit-card reveal">
                <span class="benefit-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 19V9.5M12 19V4.8M19 19v-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M3.5 19h17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span>
                <h3>Progress you can see</h3>
                <p>Regular low-stakes assessments and feedback so improvements are visible, not guessed at.</p>
            </article>
            <article class="benefit-card reveal">
                <span class="benefit-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 20.5s7-5.6 7-10.4a7 7 0 1 0-14 0c0 4.8 7 10.4 7 10.4Z" stroke="currentColor" stroke-width="1.5"/><path d="M9.2 10.4c.5 1.9 1.9 3.2 3.8 3.7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg></span>
                <h3>A calm place to learn</h3>
                <p>Supportive, respectful teaching in a quiet centre — ideal for anxious or returning learners.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section--dark enquiry-section" id="enquire">
    <div class="container enquiry-grid">
        <div class="enquiry-copy reveal">
            <p class="eyebrow eyebrow--light"><span class="eyebrow-dot"></span>Course enquiry</p>
            <h2 data-edit-key="enquiry_title">{{ $content['enquiry_title'] }}</h2>
            <p data-edit-key="enquiry_text" data-edit-type="textarea">{{ $content['enquiry_text'] }}</p>
            <ul class="check-list check-list--light">
                <li>Tell us the subject and level you are interested in.</li>
                <li>We will confirm availability, timetable and fees.</li>
                <li>No obligation — we will only recommend what fits.</li>
            </ul>
            <div class="enquiry-contact">
                <span>Prefer to talk?</span>
                <a href="tel:{{ preg_replace('/\s+/', '', \App\Support\SiteContent::get('contact')['phone']) }}">{{ \App\Support\SiteContent::get('contact')['phone'] }}</a>
            </div>
        </div>

        <div class="form-card form-card--on-dark reveal">
            <h2>Send a course enquiry</h2>
            <p class="form-intro">Complete the form and our tuition team will get back to you within one working day.</p>
            @include('partials.enquiry-form', ['source' => 'tuition'])
        </div>
    </div>
</section>
@endsection
