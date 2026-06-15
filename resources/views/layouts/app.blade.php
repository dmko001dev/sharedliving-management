@php
    $isHome = request()->routeIs('home');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shared Living Management — A structured co-living housing program providing safe, stable, and affordable housing in Cincinnati, OH.">
    <title>@yield('title', 'Shared Living Management | Co-Living Housing Program')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="@yield('body_class')">
    <header class="site-header {{ $isHome ? '' : 'scrolled' }}" id="site-header">
        <div class="container header-inner">
            <a href="{{ route('home') }}" class="logo-link">
                @if(file_exists(public_path('images/logo.png')))
                    <img src="{{ asset('images/logo.png') }}" alt="Shared Living Management" class="logo-img">
                @else
                    <span class="logo-text">
                        <span class="logo-text-main">SHARED LIVING</span>
                        <span class="logo-text-sub">MANAGEMENT</span>
                    </span>
                @endif
            </a>

            <nav class="main-nav" id="main-nav">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('properties') }}" class="{{ request()->routeIs('properties') ? 'active' : '' }}">Properties</a>
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </nav>

            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm header-cta">Partner With Us</a>

            <button class="menu-toggle" id="menu-toggle" aria-label="Open menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="mobile-nav" id="mobile-nav">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('properties') }}">Properties</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('contact') }}" class="btn btn-primary">Partner With Us</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                @if(file_exists(public_path('images/logo.png')))
                    <img src="{{ asset('images/logo.png') }}" alt="Shared Living Management" class="footer-logo">
                @endif
                <p>Structured co-living management in Cincinnati. Safe, supportive, and affordable housing for growth and independence.</p>
            </div>

            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('properties') }}">Properties</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Contact</h4>
                <ul>
                    <li>628 Maple Dr, Cincinnati, OH 45011</li>
                    <li><a href="tel:+15135710154">(513) 571-0154</a></li>
                </ul>
            </div>

            <div class="footer-hours">
                <h4>Hours</h4>
                <ul>
                    <li>Mon–Fri: 9am–6pm</li>
                    <li>Sat: 10am–2pm</li>
                    <li>Sun: Closed</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; {{ date('Y') }} Shared Living Management. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
