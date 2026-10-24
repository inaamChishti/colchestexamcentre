<article class="course-card reveal" data-level="{{ strtolower($course->level) }}">
    <div class="course-media">
        <img src="{{ asset($course->image ?: 'images/study-1.jpg') }}" alt="{{ $course->title }} tuition at Colchester Exam Centre" loading="lazy">
        <span class="level-badge">{{ $course->level }}</span>
    </div>
    <div class="course-body">
        <h3>{{ $course->title }}</h3>
        <p>{{ $course->description }}</p>

        <div class="course-meta">
            @if ($course->duration)
                <span>
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M10 6.5V10l2.4 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    {{ $course->duration }}
                </span>
            @endif
            @if ($course->schedule)
                <span>
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><rect x="3.2" y="4.8" width="13.6" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M3.2 8.2h13.6M7 3.2v3M13 3.2v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    {{ $course->schedule }}
                </span>
            @endif
        </div>

        <div class="course-foot">
            <div class="course-price">
                <span>Course fee</span>
                <strong>{{ $course->fee ?: 'On request' }}</strong>
            </div>
            <a href="{{ route('tuition.centre', ['course' => $course->title]) }}#enquire"
               class="text-link"
               data-course-enquire
               data-course-title="{{ $course->title }}">
                Enquire
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
    </div>
</article>
