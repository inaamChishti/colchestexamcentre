@php
    $source = $source ?? 'contact';
    $subjectDefault = $subjectDefault ?? '';
@endphp

<form method="POST" action="{{ route('contact.store') }}" class="enquiry-form" data-enquiry-form>
    @csrf
    <input type="hidden" name="source" value="{{ $source }}">
    <div class="hp-field" aria-hidden="true">
        <label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>

    <div class="form-grid">
        <div class="field">
            <label for="{{ $source }}-name">Full name <span>*</span></label>
            <input id="{{ $source }}-name" type="text" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" placeholder="Your name">
            @error('full_name')<span class="field-error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="{{ $source }}-email">Email address <span>*</span></label>
            <input id="{{ $source }}-email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com">
            @error('email')<span class="field-error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="{{ $source }}-phone">Phone number</label>
            <input id="{{ $source }}-phone" type="tel" name="phone" value="{{ old('phone') }}" autocomplete="tel" placeholder="Optional">
            @error('phone')<span class="field-error">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="{{ $source }}-subject">Subject</label>
            <input id="{{ $source }}-subject" type="text" name="subject" value="{{ old('subject', $subjectDefault) }}" placeholder="How can we help?" data-subject-input>
            @error('subject')<span class="field-error">{{ $message }}</span>@enderror
        </div>

        <div class="field field--full">
            <label for="{{ $source }}-message">Message <span>*</span></label>
            <textarea id="{{ $source }}-message" name="message" rows="5" required placeholder="Tell us a little about your goals, preferred dates or the course you are interested in.">{{ old('message') }}</textarea>
            @error('message')<span class="field-error">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="form-foot">
        <p class="form-note">We reply within one working day. Your details are never shared.</p>
        <button type="submit" class="btn btn--primary" data-submit>
            Send message
            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
    </div>

    @if ($errors->any())
        <p class="form-general-error">Please check the highlighted fields and try again.</p>
    @endif
</form>
