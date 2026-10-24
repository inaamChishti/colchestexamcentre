<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Staff Login | Colchester Exam Centre</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;1,9..144,500&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v=1.0">
</head>
<body>
    <main class="login-page">
        <section class="login-brand">
            <a href="{{ route('home') }}" class="login-logo">
                <svg viewBox="0 0 64 64" fill="none" aria-hidden="true"><rect width="64" height="64" rx="17" fill="#F8F5EE"/><path d="M32 11.5 46.5 19v13.2c0 10.4-6.3 17.7-14.5 20.6-8.2-2.9-14.5-10.2-14.5-20.6V19L32 11.5Z" stroke="#C79A3F" stroke-width="2.1"/><path d="M38.8 25.4a8.1 8.1 0 1 0 0 13.2" stroke="#123B2C" stroke-width="3.1" stroke-linecap="round"/><circle cx="41.4" cy="32" r="2" fill="#C79A3F"/></svg>
                <span>
                    <span class="name">Colchester</span>
                    <span class="sub">Exam Centre</span>
                </span>
            </a>

            <div class="login-brand-copy">
                <span class="eyebrow">Staff workspace</span>
                <h1>Everything your centre needs, <em>in one calm place.</em></h1>
                <p>Manage messages, tuition courses and live page content from a workspace designed to stay out of your way.</p>
                <ul class="login-features">
                    <li>Reply to candidate and parent enquiries</li>
                    <li>Publish tuition courses in seconds</li>
                    <li>Update website content without a developer</li>
                </ul>
            </div>

            <div class="login-brand-foot">
                <span>Colchester, Essex</span>
                <span>Secure staff access</span>
            </div>
        </section>

        <section class="login-form-side">
            <div class="login-card">
                <a href="{{ route('home') }}" class="mobile-logo">
                    <svg viewBox="0 0 64 64" fill="none" aria-hidden="true"><rect width="64" height="64" rx="17" fill="#123B2C"/><path d="M32 11.5 46.5 19v13.2c0 10.4-6.3 17.7-14.5 20.6-8.2-2.9-14.5-10.2-14.5-20.6V19L32 11.5Z" stroke="#C79A3F" stroke-width="2.1"/><path d="M38.8 25.4a8.1 8.1 0 1 0 0 13.2" stroke="#F8F5EE" stroke-width="3.1" stroke-linecap="round"/><circle cx="41.4" cy="32" r="2" fill="#C79A3F"/></svg>
                    <span>
                        <span class="name">Colchester</span>
                        <span class="sub">Exam Centre</span>
                    </span>
                </a>

                <span class="login-kicker">Welcome back</span>
                <h2>Sign in to your workspace</h2>
                <p>Use your staff account to continue.</p>

                @if ($errors->any())
                    <div class="login-alert">{{ $errors->first() }}</div>
                @endif

                @if (session('status'))
                    <div class="login-alert" style="background:#edf6ef;border-color:#bfdcc6;color:#1b4a2f;">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login.attempt') }}">
                    @csrf
                    <div class="login-field">
                        <label for="email">Email address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@colchesterexamcentre.co.uk">
                    </div>

                    <div class="login-field">
                        <label for="password">Password</label>
                        <div class="login-input-wrap">
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                            <button type="button" class="password-toggle" data-password-toggle="password">Show</button>
                        </div>
                    </div>

                    <div class="login-row">
                        <label class="remember">
                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                            Keep me signed in
                        </label>
                    </div>

                    <button type="submit" class="btn-admin btn-admin--primary login-submit">
                        Sign in
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                </form>

                <p class="login-foot">
                    Staff access only. If you need an account or have trouble signing in, contact the centre administrator.<br>
                    <a href="{{ route('home') }}">&larr; Back to the website</a>
                </p>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/admin.js') }}?v=1.0" defer></script>
</body>
</html>
