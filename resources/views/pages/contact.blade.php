@extends('layouts.app')

@section('title', 'Contact Us | Shared Living Management')

@section('content')

@include('components.page-hero', [
    'label' => 'Contact Us',
    'title' => 'Get in Touch with Shared Living Management',
    'subtitle' => 'Whether you are looking for housing or interested in partnering with us, we would love to hear from you. We respond within 24 hours.',
])

<section class="section section-light contact-page">
    <div class="container">
        <div class="contact-pricing-banner" data-aos="fade-up">
            <div>
                <h2>Want to Know Our Program Rates?</h2>
                <p>We keep pricing personalized. Fill out the form below or give us a call to get a quote tailored to your needs.</p>
            </div>
            <a href="tel:+15135710154" class="btn btn-accent">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                Call Now
            </a>
        </div>

        <div class="contact-page-grid">
            <aside class="contact-sidebar" data-aos="fade-right">
                <div class="contact-sidebar-card">
                    <h3>Direct Contact</h3>
                    <ul class="contact-info-list">
                        <li>
                            <span class="contact-info-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
                            </span>
                            <div class="contact-info-body">
                                <strong>Email</strong>
                                <a href="mailto:info@sharedlivingmanagement.com" class="contact-detail">info@sharedlivingmanagement.com</a>
                            </div>
                        </li>
                        <li>
                            <span class="contact-info-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </span>
                            <div class="contact-info-body">
                                <strong>Phone</strong>
                                <a href="tel:+15135710154" class="contact-detail">(513) 571-0154</a>
                            </div>
                        </li>
                        <li>
                            <span class="contact-info-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            </span>
                            <div class="contact-info-body">
                                <strong>Location</strong>
                                <span class="contact-detail">628 Maple Dr, Cincinnati, OH 45011</span>
                            </div>
                        </li>
                        <li>
                            <span class="contact-info-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </span>
                            <div class="contact-info-body">
                                <strong>Hours</strong>
                                <div class="contact-info-hours">
                                    <span class="contact-detail">Mon–Fri: 9am–6pm</span>
                                    <span class="contact-detail">Sat: 10am–2pm</span>
                                    <span class="contact-detail">Sun: Closed</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="contact-sidebar-card">
                    <h3>Referral Partners</h3>
                    <p>Case managers, shelters, and social workers — we welcome your referrals.</p>
                </div>
            </aside>

            <div class="contact-form-wrapper" data-aos="fade-left">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <p class="contact-form-note">We respond to every inquiry within 24 hours.</p>

                <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name <span class="required">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your full name" required>
                        @error('name')<span class="form-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                            @error('email')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone <span class="required">*</span></label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="(555) 123-4567" required>
                            @error('phone')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type">I Am A... <span class="required">*</span></label>
                        <select id="type" name="type" required>
                            <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select one...</option>
                            <option value="resident" {{ old('type') === 'resident' ? 'selected' : '' }}>Resident Looking for Housing</option>
                            <option value="referral" {{ old('type') === 'referral' ? 'selected' : '' }}>Agency or Referral Partner</option>
                            <option value="other" {{ old('type') === 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('type')<span class="form-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us how we can help...">{{ old('message') }}</textarea>
                        @error('message')<span class="form-error">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-accent btn-block">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
