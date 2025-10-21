@extends('layouts.app')

@section('title', $category->name . ' — LUXE Colombia')

@push('styles')
<style>
    .category-page {
        padding: 8rem 4rem 4rem;
        max-width: 1600px;
        margin: 0 auto;
    }

    .category-header {
        margin-bottom: 3rem;
    }

    .category-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        margin-bottom: 0.5rem;
    }

    .product-count {
        color: #666;
        font-size: 1rem;
    }

    .category-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 3rem;
        align-items: start;
    }

    /* Sidebar Filters */
    .filters-sidebar {
        background: white;
        padding: 2rem;
        border-radius: 2px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 6rem;
    }

    .filter-section {
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--pearl);
    }

    .filter-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .filter-title {
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1rem;
        color: var(--onyx);
    }

    .filter-select,
    .filter-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.95rem;
        background: var(--ivory);
        transition: all 0.3s ease;
    }

    .filter-select:focus,
    .filter-input:focus {
        outline: none;
        border-color: var(--gold);
        background: white;
    }

    .radio-group {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
    }

    .radio-option input[type="radio"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--gold);
    }

    .radio-option label {
        font-size: 0.95rem;
        cursor: pointer;
        color: #555;
    }

    .reset-filters {
        width: 100%;
        padding: 0.75rem;
        background: transparent;
        color: var(--onyx);
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1.5rem;
    }

    .reset-filters:hover {
        border-color: var(--gold);
        color: var(--gold);
        background: var(--champagne);
    }

    /* Products Grid */
    .products-container {
        min-height: 400px;
    }

    @media (max-width: 1024px) {
        .category-layout {
            grid-template-columns: 1fr;
        }

        .filters-sidebar {
            position: relative;
            top: 0;
        }
    }

    @media (max-width: 768px) {
        .category-page {
            padding: 6rem 2rem 2rem;
        }

        .category-header h1 {
            font-size: 2.5rem;
        }
    }
</style>
@endpush

@section('content')

<section class="category-page">
    <!-- Category Header -->
    <div class="category-header">
        <h1>{{ $category->name }}</h1>
        <p class="product-count">{{ $products->total() }} {{ Str::plural('product', $products->total()) }}</p>
    </div>

    <div class="category-layout">
        <!-- Filters Sidebar -->
        <aside class="filters-sidebar">
            <form method="GET" action="{{ route('categories.show', $category->id) }}" id="filterForm">

                <!-- Sort By -->
                <div class="filter-section">
                    <h3 class="filter-title">Sort By</h3>
                    <select name="sort" class="filter-select" onchange="this.form.submit()">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A-Z</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z-A</option>
                    </select>
                </div>

                <!-- Price Range -->
                <div class="filter-section">
                    <h3 class="filter-title">Price Range</h3>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="price_range" value="all"
                                   {{ !request('price_range') || request('price_range') == 'all' ? 'checked' : '' }}
                                   onchange="this.form.submit()">
                            <span>All Prices</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="price_range" value="under_1000"
                                   {{ request('price_range') == 'under_1000' ? 'checked' : '' }}
                                   onchange="this.form.submit()">
                            <span>Under $1,000</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="price_range" value="1000_2000"
                                   {{ request('price_range') == '1000_2000' ? 'checked' : '' }}
                                   onchange="this.form.submit()">
                            <span>$1,000 - $2,000</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="price_range" value="over_2000"
                                   {{ request('price_range') == 'over_2000' ? 'checked' : '' }}
                                   onchange="this.form.submit()">
                            <span>Over $2,000</span>
                        </label>
                    </div>
                </div>

                <!-- Category (if needed for subcategories) -->
                <div class="filter-section">
                    <h3 class="filter-title">Category</h3>
                    <select name="category" class="filter-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($category as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand (placeholder) -->
                <div class="filter-section">
                    <h3 class="filter-title">Brand</h3>
                    <select name="brand" class="filter-select">
                        <option value="">All Brands</option>
                        <option value="luxe">LUXE Signature</option>
                        <option value="premium">Premium Collection</option>
                        <option value="exclusive">Exclusive Edition</option>
                    </select>
                </div>

                <!-- Reset Filters -->
                <button type="button" class="reset-filters" onclick="resetFilters()">
                    Reset Filters
                </button>
            </form>
        </aside>

        <!-- Products Grid -->
        <div class="products-container">
            @if($products->count() > 0)
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
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                    <div style="display: flex; justify-content: center; margin-top: 4rem;">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <div style="text-align: center; padding: 4rem 2rem;">
                    <p class="text-muted" style="font-size: 1.1rem; margin-bottom: 2rem;">
                        No products found matching your criteria.
                    </p>
                    <button type="button" class="btn-primary" onclick="resetFilters()">
                        Clear Filters
                    </button>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function resetFilters() {
        window.location.href = '{{ route("categories.show", $category->id) }}';
    }

    // Scroll reveal for products
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
