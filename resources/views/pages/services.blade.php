@extends('layouts.app')

@section('title', 'Co-Living Services | Shared Living Management')

@section('content')

@include('components.page-hero', [
    'label' => $hero?->label,
    'title' => $hero?->title,
    'subtitle' => $hero?->subtitle,
    'image' => $hero?->imageUrl(),
])

<section class="section section-light">
    <div class="container">
        <div class="services-page-grid">
            <div class="services-page-content" data-aos="fade-right">
                <span class="section-label">{{ $residentsSection?->label }}</span>
                <h2>{{ $residentsSection?->title }}</h2>
                @if($residentsSection?->lead)
                    <p class="lead">{{ $residentsSection->lead }}</p>
                @endif
                @if($residentsSection?->intro)
                    <p>{{ $residentsSection->intro }}</p>
                @endif
                <ul class="check-list">
                    @foreach($residentsBenefits as $item)
                    <li><span class="goal-check">✓</span> {{ $item->content }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="services-page-image" data-aos="fade-left">
                @if($residentsSection?->imageUrl())
                    <img src="{{ $residentsSection->imageUrl() }}" alt="{{ $residentsSection->title }}" loading="lazy">
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section section-gray">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">{{ $serveSection?->label }}</span>
            <h2>{{ $serveSection?->title }}</h2>
            @if($serveSection?->description)
                <p class="section-desc">{{ $serveSection->description }}</p>
            @endif
        </div>
        <div class="serve-grid">
            @foreach($audienceCards as $index => $card)
            <div class="serve-card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <h3>{{ $card->title }}</h3>
                <p>{{ $card->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-dark">
    <div class="container">
        <div class="partners-grid">
            <div data-aos="fade-right">
                <span class="section-label section-label-light">{{ $partnersSection?->label }}</span>
                <h2>{{ $partnersSection?->title }}</h2>
                @if($partnersSection?->description)
                    <p class="section-desc" style="margin-left:0;color:rgba(255,255,255,0.75);">{{ $partnersSection->description }}</p>
                @endif
                @if($partnersSection?->intro)
                    <p style="color:rgba(255,255,255,0.75);margin:1rem 0;">{{ $partnersSection->intro }}</p>
                @endif
                <ul class="check-list check-list-light">
                    @foreach($partnersBenefits as $item)
                    <li><span class="goal-check">✓</span> {{ $item->content }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('contact') }}" class="btn btn-primary" style="margin-top:1.5rem;">{{ $partnersSection?->button_text ?? 'Become a Partner' }}</a>
            </div>
            <div class="partners-card" data-aos="fade-left">
                <h3>{{ $referralSection?->title }}</h3>
                <p>{{ $referralSection?->description }}</p>
                <a href="tel:+15135710154" class="btn btn-outline-light btn-block">Call (513) 571-0154</a>
            </div>
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="two-col-section">
            <div data-aos="fade-up">
                <span class="section-label">{{ $applySection?->label }}</span>
                <h2>{{ $applySection?->title }}</h2>
                <ol class="numbered-list">
                    @foreach($applySteps as $item)
                    <li>{{ $item->content }}</li>
                    @endforeach
                </ol>
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
                <span class="section-label">{{ $requirementsSection?->label }}</span>
                <h2>{{ $requirementsSection?->title }}</h2>
                <ul class="check-list">
                    @foreach($requirements as $item)
                    <li><span class="goal-check">✓</span> {{ $item->content }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section section-gray" id="faq">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">{{ $faqSection?->label }}</span>
            <h2>{{ $faqSection?->title }}</h2>
        </div>
        <div class="faq-list">
            @foreach($faqs as $index => $faq)
            <details class="faq-item" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                <summary>{{ $faq->question }}</summary>
                <p>{{ $faq->answer }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>

@endsection
