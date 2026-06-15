<article class="property-card" data-aos="fade-up" data-aos-delay="{{ $delay ?? 0 }}">
    <div class="property-card-image">
        <img src="{{ $image }}" alt="{{ $title }}" loading="lazy">
        <span class="property-badge">{{ $badge }}</span>
    </div>
    <div class="property-card-body">
        <h3>{{ $title }}</h3>
        <p class="property-location">{{ $location }}</p>
        <p class="property-pricing">{{ $pricing ?? 'Contact us for pricing' }}</p>
        <div class="property-tags">
            @foreach($tags as $tag)
                <span class="property-tag">{{ $tag }}</span>
            @endforeach
        </div>
        <a href="{{ route('contact') }}" class="btn btn-accent btn-block">Schedule a Tour</a>
    </div>
</article>
