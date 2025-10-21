@extends('layouts.app')

@section('title', 'Shop by Category — LUXE Colombia')

@section('content')

<section class="hero" style="height: 60vh;">
    <div class="hero-bg" style="background: linear-gradient(rgba(26, 26, 26, 0.4), rgba(26, 26, 26, 0.5)), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1920&q=90'); background-size: cover; background-position: center;"></div>

    <div class="hero-content">
        <p class="hero-subtitle">Discover Our Collections</p>
        <h1 class="hero-title" style="font-size: 3.5rem;">Shop by Category</h1>
        <p class="hero-description">Explore our curated selections of luxury fashion and accessories</p>
    </div>
</section>

<section class="categories-section" style="padding: 6rem 4rem;">
    <div class="section-title">
        <p class="section-label">Browse Collections</p>
        <h2>All Categories</h2>
        <p style="text-align:center;max-width:700px;margin:1rem auto 0;color:#666;font-size:1.05rem;">
            From timeless classics to contemporary designs, discover the perfect pieces that define your style
        </p>
    </div>

    <div class="categories-grid">
        @forelse($category as $cat)
            <a href="{{ route('categories.show', $category->id) }}" class="category-card">
                <img src="{{ \App\Helpers\ImageHelper::getCategoryImage($category) }}"
                     alt="{{ $category->name }}"
                     class="category-image"
                     loading="lazy">
                <div class="category-overlay">
                    <p class="category-label">Explore Collection</p>
                    <h3 class="category-title">{{ $category->name }}</h3>
                    <p style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem; margin-bottom: 1rem;">
                        {{ $category->products_count }} {{ Str::plural('Product', $category->products_count) }}
                    </p>
                    <span class="category-cta">Discover →</span>
                </div>
            </a>
        @empty
            <div style="grid-column:1 / -1; text-align:center; padding: 4rem 2rem;">
                <p class="text-muted" style="font-size: 1.1rem; margin-bottom: 2rem;">
                    No categories available at the moment.
                </p>
                <a href="{{ route('products.index') }}" class="btn-primary">View All Products</a>
            </div>
        @endforelse
    </div>
</section>

<!-- Featured Products from All Categories -->
@if(isset($featuredProducts) && $featuredProducts->count() > 0)
<section class="featured-section" style="background: var(--pearl);">
    <div class="section-title">
        <p class="section-label">Handpicked Selection</p>
        <h2>Featured Across Categories</h2>
    </div>

    <div class="products-grid">
        @foreach($featuredProducts as $product)
            <a href="{{ route('products.show', $product->id) }}" class="product-card">
                <div class="product-image-wrapper">
                    @if($product->badge)
                        <span class="product-badge">{{ $product->badge }}</span>
                    @endif

                    <img src="{{ \App\Helpers\ImageHelper::getProductImage($product) }}"
                         alt="{{ $product->name }}"
                         class="product-image"
                         loading="lazy">

                    <div class="product-overlay">
                        <div class="product-overlay-content">
                            <p class="product-overlay-label">{{ optional($product->category)->name }}</p>
                            <h3 class="product-overlay-title">{{ $product->name }}</h3>
                            <p class="product-overlay-price">
                                ${{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <span class="product-cta">Shop Now →</span>
                        </div>
                    </div>
                </div>

                <div class="product-info">
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="product-price">
                        ${{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
    // Scroll reveal animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.category-card, .product-card');
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    });
</script>
@endpush
