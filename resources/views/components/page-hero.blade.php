<section class="page-hero {{ $class ?? '' }}">
    @if(!empty($image))
        <div class="page-hero-bg" style="background-image: url('{{ $image }}')"></div>
    @endif
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content" data-aos="fade-up">
        @if(!empty($label))
            <span class="section-label {{ !empty($dark) ? '' : 'section-label-light' }}">{{ $label }}</span>
        @endif
        <h1>{{ $title }}</h1>
        @if(!empty($subtitle))
            <p>{{ $subtitle }}</p>
        @endif
    </div>
</section>
