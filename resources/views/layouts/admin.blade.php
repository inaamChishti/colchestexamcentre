@php
    $unreadCount = \App\Models\ContactMessage::where('status', 'new')->count();
    $user = auth()->user();
    $initials = collect(explode(' ', $user->name ?? 'Admin'))
        ->filter()
        ->map(fn ($part) => mb_substr($part, 0, 1))
        ->take(2)
        ->implode('');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') | Colchester Exam Centre</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v=1.3">
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar" data-sidebar>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <svg viewBox="0 0 64 64" fill="none" aria-hidden="true"><rect width="64" height="64" rx="17" fill="#F8F5EE"/><path d="M32 11.5 46.5 19v13.2c0 10.4-6.3 17.7-14.5 20.6-8.2-2.9-14.5-10.2-14.5-20.6V19L32 11.5Z" stroke="#C79A3F" stroke-width="2.1"/><path d="M38.8 25.4a8.1 8.1 0 1 0 0 13.2" stroke="#123B2C" stroke-width="3.1" stroke-linecap="round"/><circle cx="41.4" cy="32" r="2" fill="#C79A3F"/></svg>
                <span>
                    <span class="name">Colchester</span>
                    <span class="sub">Admin Panel</span>
                </span>
            </a>

            <p class="side-label">Workspace</p>
            <nav class="side-nav" aria-label="Admin navigation">
                <a href="{{ route('admin.dashboard') }}" class="side-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="3.5" width="7" height="7" rx="1.6" stroke="currentColor" stroke-width="1.6"/><rect x="13.5" y="3.5" width="7" height="7" rx="1.6" stroke="currentColor" stroke-width="1.6"/><rect x="3.5" y="13.5" width="7" height="7" rx="1.6" stroke="currentColor" stroke-width="1.6"/><rect x="13.5" y="13.5" width="7" height="7" rx="1.6" stroke="currentColor" stroke-width="1.6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.courses.index') }}" class="side-link {{ request()->routeIs('admin.courses.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 6.2c2.7-.8 5-.2 7.5 1.3v11.2c-2.5-1.5-4.8-2.1-7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M19.5 6.2c-2.7-.8-5-.2-7.5 1.3v11.2c2.5-1.5 4.8-2.1 7.5-1.3V6.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                    Courses
                </a>
                <a href="{{ route('admin.messages.index') }}" class="side-link {{ request()->routeIs('admin.messages.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="14" rx="2.2" stroke="currentColor" stroke-width="1.6"/><path d="m4.5 6.6 7.5 5.4 7.5-5.4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    Messages
                    @if ($unreadCount > 0)
                        <span class="side-badge">{{ $unreadCount }}</span>
                    @endif
                </a>
            </nav>

            <p class="side-label">Website pages</p>
            <nav class="side-nav" aria-label="Website pages">
                <a href="{{ route('admin.pages.index') }}" class="side-link {{ request()->routeIs('admin.pages.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="3.5" width="16" height="17" rx="2.2" stroke="currentColor" stroke-width="1.6"/><path d="M8 8h8M8 12h8M8 16h5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    All pages
                </a>
                <a href="{{ route('admin.pages.edit', 'home') }}" class="side-link {{ request()->routeIs('admin.pages.edit') && request()->route('slug') === 'home' ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4.5 10.5 12 4l7.5 6.5V20a1 1 0 0 1-1 1h-13a1 1 0 0 1-1-1v-9.5Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                    Home
                </a>
            </nav>

            <div class="sidebar-foot">
                <a href="{{ route('home') }}" target="_blank" rel="noopener">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M14 4.5h5.5V10M19 5l-7 7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M18.5 13.5v4a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2v-11a2 2 0 0 1 2-2h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    View website
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 4.5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h3M15 8l4 4-4 4M19 12H9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Sign out
                    </button>
                </form>
            </div>
        </aside>

        <div class="admin-backdrop" data-sidebar-backdrop hidden></div>

        <div class="admin-main">
            <header class="admin-topbar">
                <button class="sidebar-toggle" type="button" aria-label="Toggle navigation" data-sidebar-toggle>
                    <span></span><span></span><span></span>
                </button>
                <div>
                    <span class="admin-kicker">@yield('kicker', 'Administration')</span>
                    <h1>@yield('heading', 'Dashboard')</h1>
                </div>
                <div class="admin-user">
                    <span class="admin-avatar">{{ $initials }}</span>
                    <div>
                        <strong>{{ $user->name ?? 'Administrator' }}</strong>
                        <span>Administrator</span>
                    </div>
                </div>
            </header>

            <div class="admin-content">
                @if (session('success'))
                    <div class="admin-alert" data-auto-dismiss>
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="admin-alert admin-alert--error" data-auto-dismiss>
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.6"/><path d="M10 6v4.5M10 13.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}?v=1.0" defer></script>
    @stack('scripts')
</body>
</html>

