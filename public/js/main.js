document.addEventListener('DOMContentLoaded', function () {
    // AOS scroll animations
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 60,
            disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? true : 'phone',
        });
    }

    const header = document.getElementById('site-header');
    const menuToggle = document.getElementById('menu-toggle');
    const mobileNav = document.getElementById('mobile-nav');
    const isHomePage = document.body.classList.contains('page-home');

    // Header scroll effect (home page only)
    function updateHeader() {
        if (!header || !isHomePage) return;

        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();

    // Mobile menu toggle
    if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', function () {
            const isOpen = mobileNav.classList.toggle('open');
            menuToggle.classList.toggle('active', isOpen);
            menuToggle.setAttribute('aria-expanded', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });

        mobileNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileNav.classList.remove('open');
                menuToggle.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });
    }

    // Smooth scroll offset for fixed header
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (!target) return;

            e.preventDefault();
            const headerHeight = header ? header.offsetHeight : 0;
            const top = target.getBoundingClientRect().top + window.scrollY - headerHeight;

            window.scrollTo({ top: top, behavior: 'smooth' });
        });
    });

    // Animated counters
    const counters = document.querySelectorAll('.counter');
    if (counters.length && 'IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;

                const el = entry.target;
                const target = parseInt(el.getAttribute('data-target'), 10);
                const duration = 1500;
                const start = performance.now();

                function animate(now) {
                    const elapsed = now - start;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.round(target * eased);

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    }
                }

                requestAnimationFrame(animate);
                counterObserver.unobserve(el);
            });
        }, { threshold: 0.5 });

        counters.forEach(function (counter) {
            counterObserver.observe(counter);
        });
    }
});
