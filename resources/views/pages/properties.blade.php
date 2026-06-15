@extends('layouts.app')

@section('title', 'Available Rooms & Properties | Shared Living Management')

@section('content')

@include('components.page-hero', [
    'label' => $hero?->label,
    'title' => $hero?->title,
    'subtitle' => $hero?->subtitle,
    'image' => $hero?->imageUrl(),
])

<section class="section section-light">
    <div class="container">
        <div class="properties-grid">
            @foreach($properties as $index => $property)
                @include('components.property-card', [
                    'image' => $property->imageUrl(),
                    'badge' => $property->badge,
                    'title' => $property->title,
                    'location' => $property->location,
                    'tags' => $property->tags ?? [],
                    'pricing' => $property->pricing_text,
                    'delay' => ($index % 3) * 100,
                ])
            @endforeach
        </div>
    </div>
</section>

<section class="section section-gray" id="gallery">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">{{ $gallerySection?->label }}</span>
            <h2>{{ $gallerySection?->title }}</h2>
            @if($gallerySection?->description)
                <p class="section-desc">{{ $gallerySection->description }}</p>
            @endif
        </div>

        <div class="gallery-slider" data-aos="fade-up">
            <button class="gallery-nav gallery-prev" aria-label="Previous slide">&#8249;</button>
            <div class="gallery-track-wrapper">
                <div class="gallery-track" id="gallery-track">
                    @foreach($gallerySlides as $slide)
                    <div class="gallery-slide">
                        <img src="{{ $slide->imageUrl() }}" alt="{{ $slide->caption }}" loading="lazy">
                        <div class="gallery-caption">{{ $slide->caption }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <button class="gallery-nav gallery-next" aria-label="Next slide">&#8250;</button>
        </div>
        <div class="gallery-dots" id="gallery-dots"></div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">{{ $roomTypesSection?->label }}</span>
            <h2>{{ $roomTypesSection?->title }}</h2>
        </div>
        <div class="room-types-grid">
            @foreach($roomTypes as $index => $roomType)
            <div class="room-type-card" data-aos="fade-up" @if($index > 0) data-aos-delay="{{ $index * 100 }}" @endif>
                <h3>{{ $roomType->title }}</h3>
                <p>{{ $roomType->description }}</p>
                <p class="property-pricing">{{ $roomType->pricing_text }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-dark">
    <div class="container">
        <div class="included-grid">
            <div class="included-text" data-aos="fade-right">
                <span class="section-label section-label-light">{{ $includedSection?->label }}</span>
                <h2>{{ $includedSection?->title }}</h2>
            </div>
            <ul class="included-list" data-aos="fade-left">
                @foreach($includedItems as $item)
                <li><span class="goal-check">✓</span> {{ $item->content }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<section class="section final-cta">
    <div class="container final-cta-inner" data-aos="zoom-in">
        <h2>{{ $ctaSection?->title }}</h2>
        <p>{{ $ctaSection?->subtitle }}</p>
        <a href="{{ route('contact') }}" class="btn btn-primary">{{ $ctaSection?->button_text ?? 'Schedule a Tour' }}</a>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('gallery-track');
    const dotsContainer = document.getElementById('gallery-dots');
    if (!track) return;

    const slides = track.querySelectorAll('.gallery-slide');
    let current = 0;

    slides.forEach(function (_, i) {
        const dot = document.createElement('button');
        dot.className = 'gallery-dot' + (i === 0 ? ' active' : '');
        dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
        dot.addEventListener('click', function () { goTo(i); });
        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll('.gallery-dot');

    function goTo(index) {
        current = (index + slides.length) % slides.length;
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        dots.forEach(function (d, i) { d.classList.toggle('active', i === current); });
    }

    document.querySelector('.gallery-prev')?.addEventListener('click', function () { goTo(current - 1); });
    document.querySelector('.gallery-next')?.addEventListener('click', function () { goTo(current + 1); });
});
</script>
@endpush
