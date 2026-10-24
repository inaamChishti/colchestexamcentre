@extends('layouts.app')

@section('title', $content['title'].' | Colchester Exam Centre')
@section('meta_description', $content['excerpt'])

@section('content')
@php
    $tones = ['paper', 'cream'];
    $blockIndex = 0;
@endphp

<section class="page-hero blog-post-hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container page-hero-grid">
        <div class="page-hero-copy reveal">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <a href="{{ route('blog') }}">Blog</a>
                <span aria-hidden="true">/</span>
                <span>{{ $post['category'] }}</span>
            </nav>
            <div class="blog-meta blog-meta--hero">
                <span class="blog-tag" data-edit-key="category">{{ $post['category'] }}</span>
                <span data-edit-key="date">{{ \Illuminate\Support\Carbon::parse($post['date'])->format('j F Y') }}</span>
                <span data-edit-key="read_time">{{ $post['read_time'] }}</span>
            </div>
            <h1 data-edit-key="title">{{ $post['title'] }}</h1>
            <p class="lead" data-edit-key="excerpt" data-edit-type="textarea">{{ $post['excerpt'] }}</p>
        </div>
        <div class="page-hero-media reveal">
            <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" data-edit-image="image">
            <div class="page-hero-chip">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 2.8 16 5.4v4.8c0 3.8-2.4 6.5-6 7.5-3.6-1-6-3.7-6-7.5V5.4L10 2.8Z" stroke="currentColor" stroke-width="1.5"/><path d="m7.4 9.8 1.8 1.8 3.5-3.6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Colchester Exam Centre
            </div>
        </div>
    </div>
</section>

@foreach ($post['body'] as $block)
    @include('partials.content-block', [
        'block' => $block,
        'tone' => $tones[$blockIndex % 2],
        'prefix' => 'body.'.$blockIndex,
    ])
    @php $blockIndex++; @endphp
@endforeach

<section class="cta-section">
    <div class="container">
        <div class="cta-band reveal">
            <div class="cta-orbs" aria-hidden="true"></div>
            <div class="cta-copy">
                <p class="eyebrow eyebrow--light"><span class="eyebrow-dot"></span><span data-edit-key="cta_eyebrow">{{ $content['cta_eyebrow'] }}</span></p>
                <h2 data-edit-key="cta_title">{{ $content['cta_title'] }}</h2>
                <p data-edit-key="cta_text" data-edit-type="textarea">{{ $content['cta_text'] }}</p>
            </div>
            <div class="cta-actions">
                <a href="{{ route('contact.us') }}" class="btn btn--gold">Ask the exams team</a>
            </div>
        </div>
    </div>
</section>

@if (! empty($related))
    <section class="section section--cream">
        <div class="container">
            <div class="section-head section-head--split reveal">
                <div>
                    <p class="eyebrow"><span class="eyebrow-dot"></span>Keep reading</p>
                    <h2>More practical guidance.</h2>
                </div>
                <div>
                    <a href="{{ route('blog') }}" class="text-link">View all articles
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>

            <div class="blog-grid blog-grid--related">
                @foreach ($related as $item)
                    <article class="blog-card reveal">
                        <a href="{{ route('blog.post', $item['slug']) }}" class="blog-card-image" aria-hidden="true" tabindex="-1">
                            <img src="{{ asset($item['image']) }}" alt="" loading="lazy">
                        </a>
                        <div class="blog-card-body">
                            <div class="blog-meta">
                                <span class="blog-tag">{{ $item['category'] }}</span>
                                <span>{{ \Illuminate\Support\Carbon::parse($item['date'])->format('j M Y') }}</span>
                            </div>
                            <h2><a href="{{ route('blog.post', $item['slug']) }}">{{ $item['title'] }}</a></h2>
                            <p>{{ $item['excerpt'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
