@extends('layouts.app')

@section('title', 'LUXE Colombia — Elegance Redefines the Everyday')

@section('content')

@include('layouts.hero', [
    'subtitle' => 'Fall / Winter 2025',
    'title' => 'Elegance Redefines the Everyday',
    'description' => 'Exclusive collections inspired by Colombian essence',
    'primaryText' => 'Explore Collection',
    'primaryLink' => '#featured',
    'secondaryText' => 'View Campaign',
    'secondaryLink' => '#'
])

<section class="featured-section" id="featured">
  <div class="section-title">
    <p class="section-label">Curated For You</p>
    <h2>Featured Collection</h2>
  </div>

  <div class="products-grid">
    @forelse ($products as $product)
      <a href="{{ route('products.show', ['id' => $product->id]) }}" class="product-card">
        <div class="product-image-wrapper">
          @if($product->badge)
            <span class="product-badge">{{ $product->badge }}</span>
          @endif

          <img src="{{ \App\Helpers\ImageHelper::getProductImage($product) }}"
               alt="{{ $product->name }}"
               class="product-image"
               loading="lazy" />

          <div class="product-overlay">
            <div class="product-overlay-content">
              <p class="product-overlay-label">View Details</p>
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
    @empty
      <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;">
        <p class="text-muted" style="font-size: 1.1rem; margin-bottom: 2rem;">
          No products available at the moment.
        </p>
        <a href="{{ route('products.create') }}" class="btn-primary">Add Your First Product</a>
      </div>
    @endforelse
  </div>

  @if($products->hasPages())
    <div style="display: flex; justify-content: center; margin-top: 4rem;">
      {{ $products->links() }}
    </div>
  @endif
</section>

<!-- Categories Section -->
<section class="categories-section">
  <div class="section-title">
    <h2>Shop by Category</h2>
    <p style="text-align:center;max-width:600px;margin:1rem auto 0;color:#666;">
      Discover timeless pieces crafted with Colombian passion and European elegance
    </p>
  </div>

  <div class="categories-grid">
    @forelse($category as $cat)
      <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="category-card">
        <img src="{{ \App\Helpers\ImageHelper::getCategoryImage($category) }}"
             alt="{{ $category->name }}"
             class="category-image"
             loading="lazy">
        <div class="category-overlay">
          <p class="category-label">Explore Collection</p>
          <h3 class="category-title">{{ $category->name }}</h3>
          <span class="category-cta">Discover →</span>
        </div>
      </a>
    @empty
      <div style="grid-column:1 / -1; text-align:center; padding: 3rem 2rem;">
        <p class="text-muted">No categories available.</p>
      </div>
    @endforelse
  </div>
</section>

@endsection

@push('scripts')
<script>
  // Scroll reveal animation for products and categories
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

  // Observe all cards
  document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.product-card, .category-card');
    cards.forEach(card => {
      card.style.opacity = '0';
      card.style.transform = 'translateY(30px)';
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(card);
    });
  });
</script>
@endpush
