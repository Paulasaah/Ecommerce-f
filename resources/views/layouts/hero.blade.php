<section class="hero">
    <div class="hero-bg" style="background: linear-gradient(rgba(26, 26, 26, 0.3), rgba(26, 26, 26, 0.4)), url('https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=1920&q=90'); background-size: cover; background-position: center;"></div>

    <div class="hero-content">
        <p class="hero-subtitle">{{ $subtitle ?? 'Fall / Winter 2025' }}</p>
        <h1 class="hero-title">{{ $title ?? 'Elegance Redefines the Everyday' }}</h1>
        <p class="hero-description">{{ $description ?? 'Exclusive collections inspired by Colombian essence' }}</p>

        <div class="hero-buttons">
            <a href="{{ $primaryLink ?? '#' }}" class="btn-primary">{{ $primaryText ?? 'Explore Collection' }}</a>
            <a href="{{ $secondaryLink ?? '#' }}" class="btn-secondary">{{ $secondaryText ?? 'View Campaign' }}</a>
        </div>
    </div>
</section>
