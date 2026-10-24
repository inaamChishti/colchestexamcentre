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
            <span>Sitemap</span>
        </nav>
        <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="eyebrow">{{ $content['eyebrow'] }}</span></p>
        <h1 data-edit-key="hero_title">{{ $content['hero_title'] }}</h1>
        <p class="lead" data-edit-key="hero_text" data-edit-type="textarea">{{ $content['hero_text'] }}</p>
    </div>
</section>

<section class="section section--paper">
    <div class="container">
        <div class="sitemap-grid">
            @foreach ($groups as $groupName => $links)
                <article class="sitemap-card reveal">
                    <h2>{{ $groupName }}</h2>
                    <ul>
                        @foreach ($links as $routeName => $label)
                            <li><a href="{{ route($routeName) }}">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container">
        <div class="section-head section-head--split reveal">
            <div>
                <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="posts_eyebrow">{{ $content['posts_eyebrow'] }}</span></p>
                <h2 data-edit-key="posts_title">{{ $content['posts_title'] }}</h2>
            </div>
            <div>
                <a href="{{ route('blog') }}" class="text-link"><span data-edit-key="posts_link_label">{{ $content['posts_link_label'] }}</span>
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>

        <ul class="sitemap-post-list reveal">
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('blog.post', $post['slug']) }}">{{ $post['title'] }}</a>
                    <span>{{ \Illuminate\Support\Carbon::parse($post['date'])->format('j M Y') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
