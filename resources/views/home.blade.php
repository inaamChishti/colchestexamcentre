@extends('layouts.app')

@section('title', $content['title'])
@section('meta_description', $content['meta'])

@section('content')
@php
    $highlight = $content['hero_highlight'] ?? '';
    $title = e($content['hero_title'] ?? '');
    if ($highlight !== '' && str_contains($title, e($highlight))) {
        $title = str_replace(e($highlight), '<span class="mark">'.e($highlight).'</span>', $title);
    }
@endphp

<section class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="hero-grid">
            <div class="hero-copy">
                <p class="eyebrow reveal" data-edit-key="hero_eyebrow"><span class="eyebrow-dot"></span>{{ $content['hero_eyebrow'] }}</p>
                <h1 class="reveal" data-edit-key="hero_title" data-edit-type="text">{!! $title !!}</h1>
                <p class="hero-lead reveal" data-edit-key="hero_text" data-edit-type="textarea">{{ $content['hero_text'] }}</p>

                <div class="hero-actions reveal">
                    <a href="{{ route('contact.us') }}" class="btn btn--primary">
                        Start your journey
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ route('tuition.centre') }}" class="btn btn--ghost">
                        <span data-edit-key="hero_secondary_label">{{ $content['hero_secondary_label'] }}</span>
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>

                <div class="hero-trust reveal">
                    <div class="avatar-stack" aria-hidden="true">
                        <span>SR</span><span>JM</span><span>AK</span><span>+</span>
                    </div>
                    <p><strong>Trusted by candidates across Essex</strong><br>Private entries, resits and tuition — all under one roof.</p>
                </div>
            </div>

            <div class="hero-visual reveal">
                <div class="hero-photo">
                    <img src="{{ asset($content['hero_image']) }}" alt="A calm, modern exam room at Colchester Exam Centre" data-edit-image="hero_image">
                </div>
                <div class="hero-badge">
                    <span class="hero-badge-icon">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3.5 19 6.7v5.6c0 4.4-2.8 7.5-7 8.7-4.2-1.2-7-4.3-7-8.7V6.7L12 3.5Z" stroke="currentColor" stroke-width="1.6"/><path d="m8.8 11.7 2.1 2.1 4.3-4.4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <div>
                        <strong>JCQ compliant</strong>
                        <span>Secure, professional invigilation</span>
                    </div>
                </div>
                <div class="hero-card">
                    <span class="hero-card-kicker">Next exam window</span>
                    <strong>Autumn series 2026</strong>
                    <span>Entries now open</span>
                </div>
                <div class="hero-photo-small">
                    <img src="{{ asset($content['hero_image_small']) }}" alt="Science practical facilities at Colchester Exam Centre" loading="lazy" data-edit-image="hero_image_small">
                </div>
                <div class="hero-ring" aria-hidden="true"></div>
            </div>
        </div>

        <div class="stats-band reveal">
            <div class="stat">
                <strong data-edit-key="stat_1_value">{{ $content['stat_1_value'] }}</strong>
                <span data-edit-key="stat_1_label">{{ $content['stat_1_label'] }}</span>
            </div>
            <div class="stat">
                <strong data-edit-key="stat_2_value">{{ $content['stat_2_value'] }}</strong>
                <span data-edit-key="stat_2_label">{{ $content['stat_2_label'] }}</span>
            </div>
            <div class="stat">
                <strong data-edit-key="stat_3_value">{{ $content['stat_3_value'] }}</strong>
                <span data-edit-key="stat_3_label">{{ $content['stat_3_label'] }}</span>
            </div>
        </div>
    </div>
</section>

<section class="boards" aria-label="Accepted exam boards">
    <div class="container boards-inner">
        <span class="boards-label">Registered with leading UK boards</span>
        <div class="board-names">
            <span>AQA</span>
            <span>Pearson Edexcel</span>
            <span>OCR</span>
            <span>Cambridge International</span>
            <span>WJEC Eduqas</span>
        </div>
    </div>
</section>

<section class="section section--paper">
    <div class="container split">
        <div class="image-stack reveal">
            <div class="image-stack-main">
                <img src="{{ asset($content['intro_image_main']) }}" alt="Students preparing for exams in Colchester" loading="lazy" data-edit-image="intro_image_main">
            </div>
            <div class="image-stack-secondary">
                <img src="{{ asset($content['intro_image_secondary']) }}" alt="A quiet study space at our Colchester centre" loading="lazy" data-edit-image="intro_image_secondary">
            </div>
            <div class="image-badge">
                <strong>{{ $content['stat_1_value'] }}</strong>
                <span>Years of<br>experience</span>
            </div>
        </div>

        <div class="section-copy reveal">
            <p class="eyebrow" data-edit-key="intro_eyebrow"><span class="eyebrow-dot"></span>{{ $content['intro_eyebrow'] }}</p>
            <h2 data-edit-key="intro_title">{{ $content['intro_title'] }}</h2>
            <p class="lead" data-edit-key="intro_text" data-edit-type="textarea">{{ $content['intro_text'] }}</p>

            <ul class="feature-list">
                <li>
                    <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <div><strong>Small-group learning</strong><span>Personal attention, never a crowded room.</span></div>
                </li>
                <li>
                    <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <div><strong>Examiner-led insight</strong><span>Learn the technique that earns real marks.</span></div>
                </li>
                <li>
                    <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <div><strong>Flexible scheduling</strong><span>Evening, weekend and intensive options.</span></div>
                </li>
                <li>
                    <span class="feature-icon"><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    <div><strong>Support that listens</strong><span>A named contact from enquiry to results day.</span></div>
                </li>
            </ul>

            <a href="{{ route('tuition.centre') }}" class="btn btn--primary">Discover tuition</a>
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container">
        <div class="section-head section-head--split reveal">
            <div>
                <p class="eyebrow"><span class="eyebrow-dot"></span>Exams we host</p>
                <h2>One centre. Every milestone.</h2>
            </div>
            <div>
                <p class="lead">From first GCSEs to university entrance, sit your exams in a calm, well-equipped centre with a team that knows the process inside out.</p>
                <a href="{{ route('exams') }}" class="text-link">Ask about exam entry
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>

        <div class="program-grid">
            <article class="program-card reveal">
                <span class="program-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 6.2c2.7-.8 5-.2 7.5 1.3v11.2c-2.5-1.5-4.8-2.1-7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M19.5 6.2c-2.7-.8-5-.2-7.5 1.3v11.2c2.5-1.5 4.8-2.1 7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span>
                <h3>GCSE Exams</h3>
                <p>Flexible private entries, resits and access arrangements for home-educated and independent candidates.</p>
                <a href="{{ route('gcse.exams') }}" class="text-link">Enquire about GCSE</a>
            </article>

            <article class="program-card reveal">
                <span class="program-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="8.2" stroke="currentColor" stroke-width="1.5"/><path d="M3.8 12h16.4M12 3.8c2.3 2.2 3.5 5 3.5 8.2s-1.2 6-3.5 8.2c-2.3-2.2-3.5-5-3.5-8.2S9.7 6 12 3.8Z" stroke="currentColor" stroke-width="1.5"/></svg></span>
                <h3>IGCSE Exams</h3>
                <p>International GCSE entries for Edexcel and Cambridge International in a fully compliant setting.</p>
                <a href="{{ route('igcse.exams') }}" class="text-link">Enquire about IGCSE</a>
            </article>

            <article class="program-card reveal">
                <span class="program-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3.8 14.6 9l5.7.8-4.1 4 1 5.7-5.2-2.7-5.2 2.7 1-5.7-4.1-4L9.4 9 12 3.8Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span>
                <h3>A-Level Exams</h3>
                <p>First-time entries, resits and practical endorsements supported across all major UK boards.</p>
                <a href="{{ route('alevel.exams') }}" class="text-link">Enquire about A-Level</a>
            </article>

            <article class="program-card reveal">
                <span class="program-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 4 8 3.4-8 3.4-8-3.4L12 4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="m4 11 8 3.4 8-3.4M4 14.8l8 3.4 8-3.4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span>
                <h3>GCE O-Level</h3>
                <p>Cambridge GCE O-Level assessment with clear registration steps and structured documentation support.</p>
                <a href="{{ route('gceolevel.exams') }}" class="text-link">Enquire about O-Level</a>
            </article>

            <article class="program-card reveal">
                <span class="program-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3.5 9 12 4.8 20.5 9 12 13.2 3.5 9Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M7 11.2V15c0 1.6 2.2 2.9 5 2.9s5-1.3 5-2.9v-3.8M20.5 9v5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <h3>University Entrance</h3>
                <p>Admissions tests, professional qualifications and international university exams in a secure venue.</p>
                <a href="{{ route('international.university.exams') }}" class="text-link">Enquire about university exams</a>
            </article>

            <article class="program-card reveal">
                <span class="program-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9.2" cy="8.2" r="3.1" stroke="currentColor" stroke-width="1.5"/><path d="M3.8 19c.5-3 2.6-4.8 5.4-4.8s4.9 1.8 5.4 4.8M16.3 5.7a3 3 0 0 1 0 5.9M17.2 14.6c2 .5 3.3 2.1 3.7 4.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></span>
                <h3>Private Candidate Support</h3>
                <p>New to private entry? We guide you through board selection, deadlines and exam-day requirements.</p>
                <a href="{{ route('private.candidates') }}" class="text-link">Talk to our team</a>
            </article>
        </div>
    </div>
</section>

<section class="section section--dark">
    <div class="container dark-split">
        <div class="dark-copy reveal">
            <p class="eyebrow eyebrow--light"><span class="eyebrow-dot"></span>The difference</p>
            <h2>A centre that treats you like a person, not a candidate number.</h2>
            <p>You will always know who to speak to, what happens next and how you are progressing. That is the standard we hold ourselves to.</p>
            <a href="{{ route('contact.us') }}" class="btn btn--light">Meet our team</a>
        </div>

        <div class="dark-grid">
            <article class="dark-card reveal">
                <span class="dark-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3.5 19 6.7v5.6c0 4.4-2.8 7.5-7 8.7-4.2-1.2-7-4.3-7-8.7V6.7L12 3.5Z" stroke="currentColor" stroke-width="1.6"/><path d="m8.8 11.7 2.1 2.1 4.3-4.4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <h3>JCQ-compliant standards</h3>
                <p>Strict invigilation, secure materials and full adherence to exam board regulations.</p>
            </article>
            <article class="dark-card reveal">
                <span class="dark-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 10.5 12 4l7.5 6.5V20a1 1 0 0 1-1 1h-13a1 1 0 0 1-1-1v-9.5Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M9.5 21v-6h5v6" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg></span>
                <h3>Calm, modern spaces</h3>
                <p>Bright rooms, comfortable seating and a quiet environment designed to help you focus.</p>
            </article>
            <article class="dark-card reveal">
                <span class="dark-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 5.5h15v11h-8.2L7 20v-3.5H4.5v-11Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M8.2 9.2h7.6M8.2 12.4h5.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg></span>
                <h3>Clear communication</h3>
                <p>Straight answers, timely reminders and no jargon from first enquiry to results.</p>
            </article>
            <article class="dark-card reveal">
                <span class="dark-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-6.1 7-11a7 7 0 1 0-14 0c0 4.9 7 11 7 11Z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="10" r="2.4" stroke="currentColor" stroke-width="1.6"/></svg></span>
                <h3>Local and accessible</h3>
                <p>In the heart of Colchester, with easy transport links and nearby parking.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section--paper">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span>How it works</p>
            <h2>Four simple steps from hello to your exam.</h2>
            <p class="lead">No maze of forms. Just a clear, guided process with a real person on the other end.</p>
        </div>

        <div class="steps">
            <article class="step reveal">
                <span class="step-num">01</span>
                <h3>Tell us your goal</h3>
                <p>Share the qualification, subject and timing you have in mind. We will confirm what is possible.</p>
            </article>
            <article class="step reveal">
                <span class="step-num">02</span>
                <h3>Get a clear plan</h3>
                <p>We outline entry requirements, fees, deadlines and any tuition that will help you get there.</p>
            </article>
            <article class="step reveal">
                <span class="step-num">03</span>
                <h3>Prepare with confidence</h3>
                <p>Join small-group tuition or focused revision, with feedback that tells you exactly what to improve.</p>
            </article>
            <article class="step reveal">
                <span class="step-num">04</span>
                <h3>Sit your exam</h3>
                <p>Arrive to a calm, professional centre. We handle the process so you can focus on the paper.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container">
        <div class="section-head section-head--split reveal">
            <div>
                <p class="eyebrow"><span class="eyebrow-dot"></span>Tuition centre</p>
                <h2>Expert teaching, right here in Colchester.</h2>
            </div>
            <div>
                <p class="lead">Small groups, specialist tutors and a focus on exam technique. Choose a course or ask us to build a plan around you.</p>
                <a href="{{ route('tuition.centre') }}" class="btn btn--primary">View all courses</a>
            </div>
        </div>

        <div class="course-grid">
            @foreach ($courses as $course)
                @include('partials.course-card', ['course' => $course])
            @endforeach
        </div>
    </div>
</section>

<section class="section section--paper">
    <div class="container">
        <div class="section-head section-head--center reveal">
            <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span>Candidate stories</p>
            <h2>Results matter. So does how you feel getting there.</h2>
        </div>

        <div class="quote-grid">
            <article class="quote-card reveal">
                <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
                <blockquote>“I was nervous about sitting my A-Levels as a private candidate. The team explained every step and the centre felt calm and welcoming on the day.”</blockquote>
                <div class="quote-author">
                    <span class="quote-avatar">AR</span>
                    <div><strong>Amelia R.</strong><span>A-Level private candidate</span></div>
                </div>
            </article>
            <article class="quote-card reveal">
                <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
                <blockquote>“The weekly maths tuition has transformed my son's confidence. His tutor knows the specification inside out and actually makes the sessions enjoyable.”</blockquote>
                <div class="quote-author">
                    <span class="quote-avatar">JT</span>
                    <div><strong>James T.</strong><span>Parent of a GCSE student</span></div>
                </div>
            </article>
            <article class="quote-card reveal">
                <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
                <blockquote>“Clear advice, quick replies and a really professional setup. I would not hesitate to recommend Colchester Exam Centre to anyone considering private entry.”</blockquote>
                <div class="quote-author">
                    <span class="quote-avatar">PK</span>
                    <div><strong>Priya K.</strong><span>IGCSE candidate</span></div>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="section section--cream" id="faq">
    <div class="container faq-layout">
        <div class="faq-intro reveal">
            <p class="eyebrow"><span class="eyebrow-dot"></span>Questions, answered</p>
            <h2>Good questions deserve straight answers.</h2>
            <p class="lead">If your question is not here, our team is always happy to talk it through.</p>
            <a href="{{ route('contact.us') }}" class="btn btn--ghost">Ask us directly</a>
        </div>

        <div class="faq-list reveal">
            <details open>
                <summary>Can I sit exams as a private candidate?</summary>
                <p>Yes. We welcome private, home-educated, international and mature candidates. We will confirm board availability and entry deadlines for your chosen subject before you register.</p>
            </details>
            <details>
                <summary>Which exam boards do you work with?</summary>
                <p>We work with AQA, Pearson Edexcel, OCR, Cambridge International and WJEC Eduqas. Availability can vary by subject and exam series, so please check with our team.</p>
            </details>
            <details>
                <summary>How do I register for an exam?</summary>
                <p>Send us an enquiry with your subject, level and preferred exam series. We will send an entry pack, confirm fees and guide you through the documentation and deadlines.</p>
            </details>
            <details>
                <summary>Do you offer tuition alongside exams?</summary>
                <p>We do. Our tuition centre runs small-group and one-to-one courses for GCSE, IGCSE, A-Level, university entrance and adult learners. Many candidates combine tuition with a private exam entry.</p>
            </details>
            <details>
                <summary>What should I bring on exam day?</summary>
                <p>You will receive a candidate pack with your timetable, centre address and identification requirements. Bring valid photo ID and any approved equipment listed in your pack.</p>
            </details>
            <details>
                <summary>Where are you located?</summary>
                <p>We are in central Colchester, Essex, with good access by bus, train and car. Contact us for detailed directions and parking information.</p>
            </details>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-band reveal">
            <div class="cta-orbs" aria-hidden="true"></div>
            <div class="cta-copy">
                <p class="eyebrow eyebrow--light"><span class="eyebrow-dot"></span>Ready when you are</p>
                <h2 data-edit-key="cta_title">{{ $content['cta_title'] }}</h2>
                <p data-edit-key="cta_text" data-edit-type="textarea">{{ $content['cta_text'] }}</p>
            </div>
            <div class="cta-actions">
                <a href="{{ route('contact.us') }}" class="btn btn--gold">Book a consultation</a>
                <a href="tel:{{ preg_replace('/\s+/', '', \App\Support\SiteContent::get('contact')['phone']) }}" class="btn btn--outline-light">Call our team</a>
            </div>
        </div>
    </div>
</section>
@endsection
