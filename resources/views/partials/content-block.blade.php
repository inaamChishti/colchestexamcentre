@php
    $type = $block['type'] ?? 'prose';
    $tone = $tone ?? 'paper';
    $prefix = $prefix ?? 'blocks.0';
    $key = fn ($path) => $prefix.'.'.$path;
@endphp

@if ($type === 'cards')
    <section class="section section--{{ $tone }}">
        <div class="container">
            <div class="section-head section-head--center reveal">
                @if (! empty($block['eyebrow']))
                    <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span><span data-edit-key="{{ $key('eyebrow') }}">{{ $block['eyebrow'] }}</span></p>
                @endif
                <h2 data-edit-key="{{ $key('title') }}">{{ $block['title'] ?? '' }}</h2>
                @if (! empty($block['text']))
                    <p class="lead" data-edit-key="{{ $key('text') }}" data-edit-type="textarea">{{ $block['text'] }}</p>
                @endif
            </div>

            <div class="info-card-grid">
                @foreach ($block['items'] ?? [] as $index => $item)
                    <article class="info-card info-card--content reveal">
                        <div>
                            @if (! empty($item['tag']))
                                <span class="info-tag" data-edit-key="{{ $key('items.'.$index.'.tag') }}">{{ $item['tag'] }}</span>
                            @endif
                            <h3 data-edit-key="{{ $key('items.'.$index.'.title') }}">{{ $item['title'] }}</h3>
                            <p data-edit-key="{{ $key('items.'.$index.'.text') }}" data-edit-type="textarea">{{ $item['text'] }}</p>
                            @if (! empty($item['route']) && \Illuminate\Support\Facades\Route::has($item['route']))
                                <a href="{{ route($item['route']) }}" class="text-link">
                                    <span data-edit-key="{{ $key('items.'.$index.'.link') }}">{{ $item['link'] ?? 'Read more' }}</span>
                                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h11m0 0-4.2-4.2M15 10l-4.2 4.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@elseif ($type === 'features')
    <section class="section section--{{ $tone }}">
        <div class="container">
            <div class="section-head section-head--center reveal">
                @if (! empty($block['eyebrow']))
                    <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span><span data-edit-key="{{ $key('eyebrow') }}">{{ $block['eyebrow'] }}</span></p>
                @endif
                <h2 data-edit-key="{{ $key('title') }}">{{ $block['title'] ?? '' }}</h2>
                @if (! empty($block['text']))
                    <p class="lead" data-edit-key="{{ $key('text') }}" data-edit-type="textarea">{{ $block['text'] }}</p>
                @endif
            </div>

            <div class="feature-grid">
                @foreach ($block['items'] ?? [] as $index => $item)
                    <article class="feature-card reveal">
                        <span class="feature-card-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 data-edit-key="{{ $key('items.'.$index.'.title') }}">{{ $item['title'] }}</h3>
                        <p data-edit-key="{{ $key('items.'.$index.'.text') }}" data-edit-type="textarea">{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@elseif ($type === 'table')
    <section class="section section--{{ $tone }}">
        <div class="container content-wide">
            <div class="section-head reveal">
                @if (! empty($block['eyebrow']))
                    <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="{{ $key('eyebrow') }}">{{ $block['eyebrow'] }}</span></p>
                @endif
                <h2 data-edit-key="{{ $key('title') }}">{{ $block['title'] ?? '' }}</h2>
                @if (! empty($block['text']))
                    <p class="lead" data-edit-key="{{ $key('text') }}" data-edit-type="textarea">{{ $block['text'] }}</p>
                @endif
            </div>

            <div class="table-wrap reveal">
                <table class="content-table">
                    <thead>
                        <tr>
                            @foreach ($block['columns'] ?? [] as $index => $column)
                                <th scope="col" data-edit-key="{{ $key('columns.'.$index) }}">{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($block['rows'] ?? [] as $rowIndex => $row)
                            <tr>
                                @foreach ($row as $cellIndex => $cell)
                                    <td data-edit-key="{{ $key('rows.'.$rowIndex.'.'.$cellIndex) }}">{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (! empty($block['note']))
                <p class="table-note" data-edit-key="{{ $key('note') }}" data-edit-type="textarea">{{ $block['note'] }}</p>
            @endif
        </div>
    </section>

@elseif ($type === 'faq')
    <section class="section section--{{ $tone }}">
        <div class="container content-narrow">
            <div class="section-head reveal">
                @if (! empty($block['eyebrow']))
                    <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="{{ $key('eyebrow') }}">{{ $block['eyebrow'] }}</span></p>
                @endif
                <h2 data-edit-key="{{ $key('title') }}">{{ $block['title'] ?? 'Questions, answered' }}</h2>
            </div>

            <div class="faq-list reveal">
                @foreach ($block['items'] ?? [] as $index => $item)
                    <details>
                        <summary data-edit-key="{{ $key('items.'.$index.'.q') }}">{{ $item['q'] }}</summary>
                        <p data-edit-key="{{ $key('items.'.$index.'.a') }}" data-edit-type="textarea">{{ $item['a'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

@elseif ($type === 'steps')
    <section class="section section--{{ $tone }}">
        <div class="container">
            <div class="section-head section-head--center reveal">
                @if (! empty($block['eyebrow']))
                    <p class="eyebrow eyebrow--center"><span class="eyebrow-dot"></span><span data-edit-key="{{ $key('eyebrow') }}">{{ $block['eyebrow'] }}</span></p>
                @endif
                <h2 data-edit-key="{{ $key('title') }}">{{ $block['title'] ?? '' }}</h2>
                @if (! empty($block['text']))
                    <p class="lead" data-edit-key="{{ $key('text') }}" data-edit-type="textarea">{{ $block['text'] }}</p>
                @endif
            </div>

            <div class="steps steps--content">
                @foreach ($block['items'] ?? [] as $index => $item)
                    <article class="step reveal">
                        <span class="step-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 data-edit-key="{{ $key('items.'.$index.'.title') }}">{{ $item['title'] }}</h3>
                        <p data-edit-key="{{ $key('items.'.$index.'.text') }}" data-edit-type="textarea">{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@else
    <section class="section section--{{ $tone }}">
        <div class="container content-narrow">
            <div class="content-prose reveal">
                @if (! empty($block['eyebrow']))
                    <p class="eyebrow"><span class="eyebrow-dot"></span><span data-edit-key="{{ $key('eyebrow') }}">{{ $block['eyebrow'] }}</span></p>
                @endif
                @if (! empty($block['title']))
                    <h2 data-edit-key="{{ $key('title') }}">{{ $block['title'] }}</h2>
                @endif
                @if (! empty($block['text']))
                    <p class="lead" data-edit-key="{{ $key('text') }}" data-edit-type="textarea">{{ $block['text'] }}</p>
                @endif
                @foreach ($block['paragraphs'] ?? [] as $index => $paragraph)
                    <p data-edit-key="{{ $key('paragraphs.'.$index) }}" data-edit-type="textarea">{{ $paragraph }}</p>
                @endforeach
                @if (! empty($block['bullets']))
                    <ul class="check-list">
                        @foreach ($block['bullets'] as $index => $bullet)
                            <li data-edit-key="{{ $key('bullets.'.$index) }}" data-edit-type="textarea">{{ $bullet }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>
@endif
