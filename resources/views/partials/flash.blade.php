@if (session('success'))
    <div class="flash flash--success" role="status" data-flash>
        <span class="flash-icon" aria-hidden="true">
            <svg viewBox="0 0 20 20" fill="none"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
        <p>{{ session('success') }}</p>
        <button type="button" aria-label="Dismiss" data-flash-close>&times;</button>
    </div>
@endif

@if (session('status'))
    <div class="flash flash--success" role="status" data-flash>
        <span class="flash-icon" aria-hidden="true">
            <svg viewBox="0 0 20 20" fill="none"><path d="m4.5 10.5 3.4 3.4 7.6-7.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
        <p>{{ session('status') }}</p>
        <button type="button" aria-label="Dismiss" data-flash-close>&times;</button>
    </div>
@endif
