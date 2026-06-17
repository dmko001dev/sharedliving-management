@extends('layouts.app')

@section('title', 'Shared Living Management | Co-Living Housing Program')

@section('body_class', 'page-home')

@section('content')

{{-- Hero --}}
<section class="hero" id="home">
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{ asset('backgroundvideo.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <p class="section-label hero-label" data-aos="fade-down">Professional Co-Living Management</p>
        <h1 data-aos="fade-up" data-aos-delay="100">Safe, Stable &amp; Affordable Housing for Growth and Independence</h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
            A structured co-living housing program dedicated to providing support, life skills development,
            and a path toward independent living in Cincinnati, Ohio.
        </p>
        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('properties') }}" class="btn btn-primary">View Available Rooms</a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Partner With Us</a>
        </div>
    </div>
</section>

{{-- About --}}
<section class="section section-light" id="about">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label">01 | Welcome</span>
            <h2>About Shared Living Management</h2>
        </div>
        <div class="about-grid">
            <div class="about-text" data-aos="fade-right">
                <p class="lead">
                    Shared Living Management is a structured co-living housing program dedicated to providing
                    safe, stable, and affordable housing for individuals seeking support, growth, and independence.
                </p>
                <p>
                    Our program combines comfortable shared living with hands-on workshops, personal development,
                    and community engagement — giving residents the tools they need to build a brighter future.
                </p>
                <a href="{{ route('about') }}" class="link-arrow">Learn More About Us</a>
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

{{-- Properties Preview --}}
<section class="section section-light" id="properties-preview">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">Featured Listings</span>
            <h2>Our Spaces</h2>
        </div>
        <div class="properties-grid">
            @include('components.property-card', [
                'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=600&h=400&fit=crop&q=80',
                'badge' => 'Private Rooms',
                'title' => 'Maple Drive Residence',
                'location' => 'Cincinnati, Ohio',
                'tags' => ['Furnished', 'WiFi', 'All Utilities'],
                'delay' => 0,
            ])
            @include('components.property-card', [
                'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=600&h=400&fit=crop&q=80',
                'badge' => 'Shared Rooms',
                'title' => 'West Side Commons',
                'location' => 'Cincinnati, Ohio',
                'tags' => ['Furnished', 'WiFi', 'Laundry'],
                'delay' => 100,
            ])
            @include('components.property-card', [
                'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600&h=400&fit=crop&q=80',
                'badge' => 'Private & Shared',
                'title' => 'Northside Living',
                'location' => 'Cincinnati, Ohio',
                'tags' => ['Furnished', 'WiFi', 'Parking', 'Utilities'],
                'delay' => 200,
            ])
        </div>
        <div class="section-cta-center" data-aos="fade-up">
            <a href="{{ route('properties') }}" class="btn btn-accent">View All Properties</a>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="section section-dark" id="services">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label section-label-light">02 | What We Offer</span>
            <h2>Core Services</h2>
            <p class="section-desc">Comprehensive support designed to help residents thrive in every aspect of daily life.</p>
        </div>
        <div class="cards-grid">
            @foreach([
                ['icon' => '💰', 'title' => 'Money Management Workshops', 'desc' => 'Learn budgeting, saving, and financial planning skills for long-term stability.'],
                ['icon' => '🌱', 'title' => 'Life Skill Development', 'desc' => 'Build essential everyday skills for confident, independent living.'],
                ['icon' => '📋', 'title' => 'Budget-Friendly Guidance', 'desc' => 'Practical advice on managing expenses and making smart financial choices.'],
                ['icon' => '🧼', 'title' => 'Personal Hygiene Support', 'desc' => 'Guidance and resources to maintain health, wellness, and self-care routines.'],
                ['icon' => '🍳', 'title' => 'Cooking Classes', 'desc' => 'Hands-on sessions to prepare nutritious, affordable meals at home.'],
                ['icon' => '🧘', 'title' => 'Stress Management & Mindfulness', 'desc' => 'Techniques and sessions to build emotional resilience and inner calm.'],
                ['icon' => '🤝', 'title' => 'Community Involvement', 'desc' => 'Volunteer programs and community activities that foster connection and purpose.'],
            ] as $i => $service)
            <div class="service-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="service-icon">{{ $service['icon'] }}</div>
                <h3>{{ $service['title'] }}</h3>
                <p>{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="section-cta-center" data-aos="fade-up" style="margin-top:2rem;">
            <a href="{{ route('services') }}" class="link-arrow">View All Services</a>
        </div>
    </div>
</section>

{{-- Stats / Goals --}}
<section class="section section-light" id="goals">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">03 | Our Vision</span>
            <h2>Program Goals</h2>
            <p class="section-desc">Every resident is supported toward meaningful, lasting personal growth.</p>
        </div>

        <div class="stats-grid">
            @foreach([
                ['num' => '6', 'suffix' => '+', 'label' => 'Core Services Offered'],
                ['num' => '100', 'suffix' => '%', 'label' => 'Commitment to Residents'],
                ['num' => '24', 'suffix' => '/7', 'label' => 'Safe Living Environment'],
                ['num' => '1', 'suffix' => '', 'label' => 'Community, One Home'],
            ] as $i => $stat)
            <div class="stat-card" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                <div class="stat-number">
                    <span class="counter" data-target="{{ $stat['num'] }}">0</span><span class="stat-suffix">{{ $stat['suffix'] }}</span>
                </div>
                <p>{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="goals-list" data-aos="fade-up">
            @foreach([
                'Promote self-sufficiency and independence',
                'Strengthen financial literacy and budgeting',
                'Improve healthy living habits',
                'Develop emotional resilience',
                'Encourage accountability and responsibility',
                'Build community and social engagement',
            ] as $goal)
            <div class="goal-item">
                <span class="goal-check">✓</span>
                <span>{{ $goal }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Process --}}
<section class="section section-accent" id="process">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label section-label-light">04 | How It Works</span>
            <h2>Getting Started Is Easy</h2>
        </div>
        <div class="process-grid">
            @foreach([
                ['step' => '01', 'title' => 'Apply', 'desc' => 'Contact us directly or get referred by a case manager, shelter, or community organization. We respond within 24 hours.'],
                ['step' => '02', 'title' => 'Review', 'desc' => 'We assess your eligibility, discuss your goals, and ensure our program is the right fit for your journey.'],
                ['step' => '03', 'title' => 'Join', 'desc' => 'Move into a safe, supportive home and begin participating in workshops, activities, and community life.'],
            ] as $i => $step)
            <div class="process-card" data-aos="fade-up" data-aos-delay="{{ $i * 150 }}">
                <span class="process-step">Step {{ $step['step'] }}</span>
                <h3>{{ $step['title'] }}</h3>
                <p>{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Eligibility --}}
<section class="section section-light" id="eligibility">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">05 | Who We Serve</span>
            <h2>Eligibility Requirements</h2>
            <p class="section-desc">Our program is open to adults committed to personal growth and community living.</p>
        </div>
        <div class="eligibility-grid">
            @foreach([
                ['title' => 'Stable Housing Need', 'desc' => 'Adults in need of safe, stable, and affordable co-living housing.'],
                ['title' => 'Personal Growth', 'desc' => 'A genuine commitment to developing life skills and working toward independence.'],
                ['title' => 'House Rules', 'desc' => 'Willingness to follow program guidelines and respect all residents and staff.'],
                ['title' => 'Active Participation', 'desc' => 'Participation in scheduled workshops, activities, and community programs.'],
            ] as $i => $item)
            <div class="eligibility-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="eligibility-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                <h3>{{ $item['title'] }}</h3>
                <p>{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- House Rules --}}
<section class="section section-dark" id="rules">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label section-label-light">06 | Guidelines</span>
            <h2>House Rules</h2>
            <p class="section-desc">A safe, respectful community for everyone.</p>
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

{{-- Referral CTA --}}
<section class="section cta-section" id="referral">
    <div class="container">
        <div class="cta-grid">
            <div class="cta-card" data-aos="fade-right">
                <h3>Looking for Housing?</h3>
                <p>Contact us to learn more about our co-living program and available placements.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
            </div>
            <div class="cta-card cta-card-highlight" data-aos="fade-left">
                <h3>Referral Partners Welcome</h3>
                <p>We welcome referrals from case managers, shelters, social workers, hospitals, and community organizations looking for stable and supportive housing.</p>
                <a href="{{ route('contact') }}" class="btn btn-outline-light">Partner With Us</a>
            </div>
        </div>
    </div>
</section>

{{-- Contact --}}
<section class="section section-light" id="contact">
    <div class="container">
        <div class="section-header section-header-center" data-aos="fade-up">
            <span class="section-label">07 | Reach Out</span>
            <h2>Contact Information</h2>
            <p class="section-desc">Ready to begin? We're here to help you take the first step.</p>
        </div>
        <div class="contact-grid" data-aos="fade-up">
            <div class="contact-card">
                <div class="contact-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 21s-8-4.5-8-11a8 8 0 1116 0c0 6.5-8 11-8 11z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <h3>Address</h3>
                <p>628 Maple Dr Cincinnati OH 45215</p>
            </div>
            <div class="contact-card">
                <div class="contact-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                </div>
                <h3>Phone</h3>
                <p><a href="tel:+15135710154">(513) 571-0154</a></p>
            </div>
            <div class="contact-card">
                <div class="contact-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <h3>Referrals</h3>
                <p>Case managers, shelters &amp; social workers welcome</p>
            </div>
        </div>
    </div>
</section>

{{-- Final CTA --}}
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
