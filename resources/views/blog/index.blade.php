@extends('layouts.app')

@section('title', $content['title'])
@section('meta_description', $content['meta'])

@section('content')
<section class="blog-hero">
    <div class="page-hero-glow" aria-hidden="true"></div>
    <div class="container blog-hero-inner reveal">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span aria-hidden="true">/</span>
            <span>Blog</span>
        </nav>
        <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="eyebrow">{{ $content['eyebrow'] }}</span></p>
        <h1 data-edit-key="hero_title">{{ $content['hero_title'] }}</h1>
        <p class="lead" data-edit-key="hero_text" data-edit-type="textarea">{{ $content['hero_text'] }}</p>
    </div>
</section>

<section class="section section--paper">
    <div class="container">
        <div class="blog-grid">
            @foreach ($posts as $post)
                <article class="blog-card reveal">
                    <a href="{{ route('blog.post', $post['slug']) }}" class="blog-card-image" aria-hidden="true" tabindex="-1">
                        <img src="{{ asset($post['image']) }}" alt="" loading="lazy">
                    </a>
                    <div class="blog-card-body">
                        <div class="blog-meta">
                            <span class="blog-tag">{{ $post['category'] }}</span>
                            <span>{{ \Illuminate\Support\Carbon::parse($post['date'])->format('j M Y') }}</span>
                            <span>{{ $post['read_time'] }}</span>
                        </div>
                        <h2><a href="{{ route('blog.post', $post['slug']) }}">{{ $post['title'] }}</a></h2>
                        <p>{{ $post['excerpt'] }}</p>
                        <a href="{{ route('blog.post', $post['slug']) }}" class="text-link">
                            Read the guide
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

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
                <a href="{{ route('contact.us') }}" class="btn btn--gold">Contact the centre</a>
            </div>
        </div>
    </div>
</section>
@endsection
