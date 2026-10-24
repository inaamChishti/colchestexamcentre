@php
    $contact = \App\Support\SiteContent::get('contact');
@endphp

<footer class="site-footer">
    <div class="footer-glow" aria-hidden="true"></div>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="brand brand--footer" aria-label="Colchester Exam Centre home">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 64 64" fill="none"><rect width="64" height="64" rx="17" fill="#F8F5EE"/><path d="M32 11.5 46.5 19v13.2c0 10.4-6.3 17.7-14.5 20.6-8.2-2.9-14.5-10.2-14.5-20.6V19L32 11.5Z" stroke="#C79A3F" stroke-width="2.1"/><path d="M38.8 25.4a8.1 8.1 0 1 0 0 13.2" stroke="#123B2C" stroke-width="3.1" stroke-linecap="round"/><circle cx="41.4" cy="32" r="2" fill="#C79A3F"/></svg>
                    </span>
                    <span class="brand-text">
                        <span class="brand-name">Colchester</span>
                        <span class="brand-sub">Exam Centre</span>
                    </span>
                </a>
                <p>Confidence, built in. A modern private exam centre and tuition centre serving Colchester and North Essex.</p>
                <div class="footer-badges">
                    <span>JCQ compliant</span>
                    <span>Private candidates</span>
                </div>
            </div>

            <div class="footer-col">
                <h3>Explore</h3>
                <a href="{{ route('exams') }}">Exams</a>
                <a href="{{ route('exam.registration') }}">Exam registration</a>
                <a href="{{ route('tuition.centre') }}">Tuition Centre</a>
                <a href="{{ route('tuition') }}">Tuition</a>
                <a href="{{ route('form') }}">Online form</a>
                <a href="{{ route('practical.endorsement') }}">Practical endorsement</a>
                <a href="{{ route('online.learning') }}">Online learning</a>
                <a href="{{ route('blog') }}">Blog</a>
                <a href="{{ route('contact.us') }}">Contact Us</a>
                <a href="{{ route('sitemap') }}">Sitemap</a>
            </div>

            <div class="footer-col">
                <h3>Opening hours</h3>
                <p>{{ $contact['hours_weekday'] }}</p>
                <p>{{ $contact['hours_saturday'] }}</p>
                <p>{{ $contact['hours_sunday'] }}</p>
            </div>

            <div class="footer-col">
                <h3>Visit us</h3>
                <p>{{ $contact['address_line1'] }}<br>{{ $contact['address_line2'] }}<br>{{ $contact['city'] }} {{ $contact['postcode'] }}</p>
                <a href="tel:{{ preg_replace('/\s+/', '', $contact['phone']) }}">{{ $contact['phone'] }}</a>
                <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Colchester Exam Centre. All rights reserved.</span>
            <span class="footer-legal">
                <a href="{{ route('privacy.policy') }}">Privacy</a>
                <a href="{{ route('cookie.policy') }}">Cookies</a>
                <a href="{{ route('terms.of.use') }}">Terms</a>
                <a href="{{ route('login') }}">Staff login</a>
            </span>
            <span>Colchester, Essex · United Kingdom</span>
        </div>
    </div>
</footer>
