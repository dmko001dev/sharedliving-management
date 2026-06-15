@extends('layouts.app')

@section('title', 'About Us | Shared Living Management')

@section('content')

@include('components.page-hero', [
    'label' => '01 | Welcome',
    'title' => 'Welcome to Shared Living Management',
    'subtitle' => 'A structured co-living housing program dedicated to safe, stable, and affordable housing in Cincinnati, Ohio.',
    'image' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=1600&h=900&fit=crop&q=80',
])

<section class="section section-light">
    <div class="container">
        <div class="about-grid">
            <div class="about-text" data-aos="fade-right">
                <p class="lead">
                    Shared Living Management is a structured co-living housing program dedicated to providing
                    safe, stable, and affordable housing for individuals seeking support, growth, and independence.
                </p>
                <p>
                    Our program combines comfortable shared living with hands-on workshops, personal development,
                    and community engagement — giving residents the tools they need to build a brighter future.
                    We work closely with housing agencies, social services, and referral partners to provide
                    reliable placement options for those who need them most.
                </p>
                <a href="{{ route('services') }}" class="link-arrow">Explore Our Services</a>
            </div>
            <div class="mission-card" data-aos="fade-left">
                <div class="mission-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                </div>
                <h3>Mission Statement</h3>
                <p>
                    Our mission is to create a supportive environment where residents can develop life skills,
                    build financial stability, and transition into independent living successfully.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-gray">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">Program Goals</span>
            <h2>What We Aim to Achieve</h2>
        </div>
        <div class="goals-list">
            @foreach([
                'Promote self-sufficiency and independence',
                'Strengthen financial literacy and budgeting',
                'Improve healthy living habits',
                'Develop emotional resilience',
                'Encourage accountability and responsibility',
                'Build community and social engagement',
            ] as $goal)
            <div class="goal-item" data-aos="fade-up">
                <span class="goal-check">✓</span>
                <span>{{ $goal }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-dark">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label section-label-light">Guidelines</span>
            <h2>House Rules</h2>
        </div>
        <div class="rules-grid">
            @foreach([
                'Respect all residents and staff',
                'Keep shared spaces clean',
                'No violence or illegal substances',
                'Attend scheduled workshops',
                'Pay program fees on time',
                'Follow all safety policies',
            ] as $i => $rule)
            <div class="rule-card" data-aos="flip-left" data-aos-delay="{{ $i * 80 }}">
                <span class="rule-icon">◆</span>
                <p>{{ $rule }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section final-cta">
    <div class="container final-cta-inner" data-aos="zoom-in">
        <h2>Ready To Begin?</h2>
        <p>Take the first step toward safe, supportive co-living. Contact us today.</p>
        <div class="hero-buttons">
            <a href="{{ route('properties') }}" class="btn btn-primary">View Properties</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light">Contact Us</a>
        </div>
    </div>
</section>

@endsection
