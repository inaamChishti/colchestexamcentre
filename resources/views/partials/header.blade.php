@php
    $contact = \App\Support\SiteContent::get('contact');
    $navGroups = \App\Support\SitePages::navGroups();
@endphp

<div class="topbar">
    <div class="container topbar-inner">
        <div class="topbar-left">
            <span class="topbar-item">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-6.1 7-11a7 7 0 1 0-14 0c0 4.9 7 11 7 11Z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="10" r="2.4" stroke="currentColor" stroke-width="1.6"/></svg>
                {{ $contact['city'] }}, Essex
            </span>
            <span class="topbar-item">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/><path d="M12 7.5v5l3 1.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                Mon – Fri, 9am – 6pm
            </span>
        </div>
        <div class="topbar-right">
            <a class="topbar-item" href="tel:{{ preg_replace('/\s+/', '', $contact['phone']) }}">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.5 3.5h2.2l1.4 4-2 1.4a12 12 0 0 0 5 5l1.4-2 4 1.4v2.2a2 2 0 0 1-2.2 2A15.5 15.5 0 0 1 4.5 5.7a2 2 0 0 1 2-2.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                {{ $contact['phone'] }}
            </a>
            <a class="topbar-item topbar-email" href="mailto:{{ $contact['email'] }}">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5.5" width="17" height="13" rx="2.2" stroke="currentColor" stroke-width="1.6"/><path d="m4.5 7 7.5 5.5L19.5 7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                {{ $contact['email'] }}
            </a>
        </div>
    </div>
</div>

<header class="site-header" data-header>
    <div class="container head-inner">
        <a href="{{ route('home') }}" class="brand" aria-label="Colchester Exam Centre home">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 64 64" fill="none"><rect width="64" height="64" rx="17" fill="#123B2C"/><path d="M32 11.5 46.5 19v13.2c0 10.4-6.3 17.7-14.5 20.6-8.2-2.9-14.5-10.2-14.5-20.6V19L32 11.5Z" stroke="#C79A3F" stroke-width="2.1"/><path d="M38.8 25.4a8.1 8.1 0 1 0 0 13.2" stroke="#F8F5EE" stroke-width="3.1" stroke-linecap="round"/><circle cx="41.4" cy="32" r="2" fill="#C79A3F"/></svg>
            </span>
            <span class="brand-text">
                <span class="brand-name">Colchester</span>
                <span class="brand-sub">Exam Centre</span>
            </span>
        </a>

        <nav class="nav" aria-label="Primary">
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'is-active' : '' }}"
               @if (request()->routeIs('home')) aria-current="page" @endif>
                Home
            </a>

            @foreach ($navGroups as $groupName => $links)
                @if ($groupName !== 'Policies')
                    @php
                        $groupActive = collect($links)->keys()->contains(fn ($routeName) => request()->routeIs($routeName));
                    @endphp
                    <div class="nav-item" data-nav-group>
                        <button type="button"
                                class="nav-group-toggle {{ $groupActive ? 'is-active' : '' }}"
                                aria-expanded="false"
                                aria-haspopup="true"
                                data-nav-group-toggle>
                            {{ $groupName }}
                            <svg viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="m2.5 4.5 3.5 3 3.5-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                        <div class="nav-dropdown">
                            @foreach ($links as $routeName => $label)
                                <a href="{{ route($routeName) }}"
                                   class="{{ request()->routeIs($routeName) ? 'is-active' : '' }}"
                                   @if (request()->routeIs($routeName)) aria-current="page" @endif>
                                    {{ $label }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            <a href="{{ route('contact.us') }}"
               class="{{ request()->routeIs('contact.us') ? 'is-active' : '' }}"
               @if (request()->routeIs('contact.us')) aria-current="page" @endif>
                Contact Us
            </a>
        </nav>

        <div class="head-actions">
            <a href="{{ route('contact.us') }}" class="btn btn--primary btn--sm nav-cta">
                Book a consultation
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <button class="nav-toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-nav" data-nav-toggle>
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<div class="nav-backdrop" data-nav-backdrop hidden></div>
<aside class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation" data-mobile-nav>
    <div class="mobile-nav-head">
        <span class="brand-name">Colchester</span>
        <button class="mobile-close" type="button" aria-label="Close menu" data-nav-close>&times;</button>
    </div>
    <nav class="mobile-links">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
        <a href="{{ route('contact.us') }}" class="{{ request()->routeIs('contact.us') ? 'is-active' : '' }}">Contact Us</a>

        @foreach ($navGroups as $groupName => $links)
            <div class="mobile-group">
                <span class="mobile-group-label">{{ $groupName }}</span>
                @foreach ($links as $routeName => $label)
                    <a href="{{ route($routeName) }}" class="{{ request()->routeIs($routeName) ? 'is-active' : '' }}">{{ $label }}</a>
                @endforeach
            </div>
        @endforeach

        <a href="{{ route('contact.us') }}" class="mobile-nav-cta">Book a consultation</a>
    </nav>
    <div class="mobile-nav-foot">
        <a href="tel:{{ preg_replace('/\s+/', '', $contact['phone']) }}">{{ $contact['phone'] }}</a>
        <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
        <span>{{ $contact['address_line2'] }}, {{ $contact['city'] }} {{ $contact['postcode'] }}</span>
    </div>
</aside>
