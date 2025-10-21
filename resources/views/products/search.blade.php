@extends('layouts.app')

@section('title', 'Search Results — LUXE Colombia')

@push('styles')
<style>
    .search-page {
        padding: 8rem 4rem 4rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .search-header {
        margin-bottom: 3rem;
        text-align: center;
    }

    .search-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .search-query {
        color: var(--gold);
        font-style: italic;
    }

    .search-results-count {
        color: #666;
        font-size: 1rem;
    }

    .search-bar-container {
        max-width: 700px;
        margin: 0 auto 4rem;
        position: relative;
    }

    .search-bar {
        width: 100%;
        padding: 1.2rem 3.5rem 1.2rem 1.5rem;
        border: 2px solid var(--pearl);
        border-radius: 50px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .search-bar:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.1);
    }

    .search-btn {
        position: absolute;
        right: 0.5rem;
        top: 50%;
        transform: translateY(-50%);
        background: var(--gold);
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-btn:hover {
        background: #C5A028;
        transform: translateY(-50%) scale(1.05);
    }

    .search-btn svg {
        width: 20px;
        height: 20px;
        stroke: var(--onyx);
    }

    .no-results {
        text-align: center;
        padding: 4rem 2rem;
    }

    .no-results-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 2rem;
        opacity: 0.3;
    }

    .search-suggestions {
        margin-top: 3rem;
    }

    .suggestions-title {
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #666;
        margin-bottom: 1rem;
    }

    .suggestions-list {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .suggestion-tag {
        padding: 0.5rem 1rem;
        background: var(--ivory);
        border: 1px solid var(--pearl);
        border-radius: 20px;
        font-size: 0.9rem;
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .suggestion-tag:hover {
        background: var(--champagne);
        border-color: var(--gold);
        color: var(--gold);
    }

    @media (max-width: 768px) {
        .search-page {
            padding: 6rem 2rem 2rem;
        }

        .search-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')

<section class="search-page">
    <!-- Search Header -->
    <div class="search-header">
        <h1 class="search-title">
            @if($query)
                Search Results for <span class="search-query">"{{ $query }}"</span>
            @else
                Search Products
            @endif
        </h1>
        @if($query && isset($products))
            <p class="search-results-count">
                Found {{ $products->total() }} {{ Str::plural('result', $products->total()) }}
            </p>
        @endif
    </div>

    <!-- Search Bar -->
    <div class="search-bar-container">
        <form method="GET" action="{{ route('products.search') }}">
            <input
                type="text"
                name="q"
                class="search-bar"
                placeholder="Search for products, categories, or brands..."
                value="{{ $query ?? '' }}"
                autofocus
            >
            <button type="submit" class="search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </button>
        </form>
    </div>

    <!-- Results -->
    @if(isset($products) && $products->count() > 0)
        <div class="products-grid">
            @foreach($products as $product)
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

        <!-- Pagination -->
        @if($products->hasPages())
            <div style="display: flex; justify-content: center; margin-top: 4rem;">
                {{ $products->appends(['q' => $query])->links() }}
            </div>
        @endif

    @elseif($query)
        <!-- No Results -->
        <div class="no-results">
            <svg class="no-results-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
                <line x1="9" y1="9" x2="13" y2="13"></line>
                <line x1="13" y1="9" x2="9" y2="13"></line>
            </svg>

            <h2 style="font-size: 1.75rem; margin-bottom: 1rem;">No results found for "{{ $query }}"</h2>
            <p style="color: #666; margin-bottom: 2rem;">
                Try different keywords or browse our categories
            </p>

            <a href="{{ route('products.index') }}" class="btn-primary">View All Products</a>

            <!-- Search Suggestions -->
            <div class="search-suggestions">
                <p class="suggestions-title">Popular Searches</p>
                <div class="suggestions-list">
                    <a href="{{ route('products.search', ['q' => 'dress']) }}" class="suggestion-tag">Dress</a>
                    <a href="{{ route('products.search', ['q' => 'jacket']) }}" class="suggestion-tag">Jacket</a>
                    <a href="{{ route('products.search', ['q' => 'accessories']) }}" class="suggestion-tag">Accessories</a>
                    <a href="{{ route('products.search', ['q' => 'jewelry']) }}" class="suggestion-tag">Jewelry</a>
                    <a href="{{ route('products.search', ['q' => 'bags']) }}" class="suggestion-tag">Bags</a>
                    <a href="{{ route('products.search', ['q' => 'shoes']) }}" class="suggestion-tag">Shoes</a>
                </div>
            </div>
        </div>
    @endif
</section>

@endsection

@push('scripts')
<script>
    // Highlight search query in results
    const query = '{{ $query ?? '' }}';

    if (query) {
        document.querySelectorAll('.product-name, .product-overlay-title').forEach(element => {
            const text = element.textContent;
            const regex = new RegExp(`(${query})`, 'gi');
            if (regex.test(text)) {
                element.innerHTML = text.replace(regex, '<mark style="background: var(--champagne); padding: 0 0.25rem;">$1</mark>');
            }
        });
    }

    // Scroll reveal
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
        const cards = document.querySelectorAll('.product-card');
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    });
</script>
@endpush
