@extends('layouts.app')

@section('title', ($product->name ?? 'Product Details') . ' — LUXE Colombia')

@section('content')
<div class="product-detail">
  <!-- Product Gallery -->
  <div class="product-gallery">
    <img src="{{ \App\Helpers\ImageHelper::getProductImage($product) }}"
         alt="{{ $product->name }}"
         class="main-image"
         id="mainImage">

    @if($product->badge)
      <span class="product-badge" style="position: absolute; top: 1.5rem; right: 1.5rem;">
        {{ $product->badge }}
      </span>
    @endif
  </div>

  <!-- Product Details -->
  <div class="product-details">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
      <a href="{{ route('products.index') }}">Home</a>
      <span>/</span>
      <a href="{{ route('categories.show', $product->category_id ?? 1) }}">
        {{ optional($product->category)->name ?? 'Products' }}
      </a>
      <span>/</span>
      <span>{{ $product->name }}</span>
    </div>

    <!-- Product Title -->
    <h1 class="product-title">{{ $product->name }}</h1>

    <!-- Price -->
    <div class="product-price-detail">
      ${{ number_format($product->price, 0, ',', '.') }}
    </div>

    <!-- Description -->
    <p class="product-description">{{ $product->description }}</p>

    <!-- Size Selector -->
    @php
      $sizes = is_string($product->sizes) ? json_decode($product->sizes, true) : $product->sizes;
      $sizes = is_array($sizes) ? $sizes : ['S', 'M', 'L'];
    @endphp

    <div class="size-selector">
      <label class="size-label">Select Size</label>
      <div class="size-options" id="sizeOptions">
        @foreach ($sizes as $size)
          <div class="size-option" data-size="{{ $size }}">{{ $size }}</div>
        @endforeach
      </div>
    </div>

    <!-- Quantity Selector -->
    <div class="quantity-selector">
      <label class="size-label">Quantity</label>
      <div class="quantity-controls">
        <button class="qty-btn" id="decrease" type="button">−</button>
        <input type="number" value="1" min="1" max="{{ $product->stock ?? 10 }}" class="qty-input" id="quantity" readonly>
        <button class="qty-btn" id="increase" type="button">+</button>
      </div>
      <p style="font-size: 0.85rem; color: #666; margin-top: 0.5rem;">
        @if($product->stock > 0)
          <span style="color: #28A745;">✓</span> {{ $product->stock }} items in stock
        @else
          <span style="color: #DC3545;">✗</span> Out of stock
        @endif
      </p>
    </div>

    <!-- Add to Cart Button -->
    <button class="btn-primary add-to-cart" type="button" {{ $product->stock <= 0 ? 'disabled' : '' }}>
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.5rem;">
        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
        <path d="M3 6h18"></path>
        <path d="M16 10a4 4 0 0 1-8 0"></path>
      </svg>
      {{ $product->stock > 0 ? 'Add to Cart' : 'Out of Stock' }}
    </button>

    <!-- Wishlist Button -->
    <button class="btn-secondary" type="button" style="width: 100%; margin-top: 1rem;">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.5rem;">
        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
      </svg>
      Add to Wishlist
    </button>

    <!-- Product Meta -->
    <div class="product-meta">
      <div><span class="meta-label">SKU</span></div>
      <div><span class="meta-value">{{ $product->sku ?? 'N/A' }}</span></div>

      <div><span class="meta-label">Category</span></div>
      <div><span class="meta-value">{{ optional($product->category)->name ?? 'Uncategorized' }}</span></div>

      <div><span class="meta-label">Availability</span></div>
      <div><span class="meta-value" style="color: {{ $product->stock > 0 ? '#28A745' : '#DC3545' }};">
        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
      </span></div>
    </div>
  </div>
</div>

<!-- Additional Product Information Section -->
<section class="featured-section" style="padding-top: 0;">
  <div class="section-title">
    <h2>Product Details</h2>
  </div>

  <div style="max-width: 900px; margin: 0 auto; background: white; padding: 3rem; border-radius: 2px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
      <div>
        <h3 style="font-size: 1.1rem; margin-bottom: 1rem; color: var(--gold);">Materials & Care</h3>
        <p style="line-height: 1.8; color: #666;">
          Premium materials carefully selected for durability and comfort.
          Machine wash cold, tumble dry low. Iron on low heat if needed.
        </p>
      </div>

      <div>
        <h3 style="font-size: 1.1rem; margin-bottom: 1rem; color: var(--gold);">Shipping & Returns</h3>
        <p style="line-height: 1.8; color: #666;">
          Free shipping on orders over $100.
          30-day return policy. Items must be unworn with tags attached.
        </p>
      </div>

      <div>
        <h3 style="font-size: 1.1rem; margin-bottom: 1rem; color: var(--gold);">Size Guide</h3>
        <p style="line-height: 1.8; color: #666;">
          Fits true to size. If between sizes, we recommend sizing up.
          See our detailed size chart for measurements.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  // Size selection
  const sizeOptions = document.querySelectorAll('.size-option');
  let selectedSize = null;

  sizeOptions.forEach(opt => {
    opt.addEventListener('click', () => {
      sizeOptions.forEach(o => o.classList.remove('selected'));
      opt.classList.add('selected');
      selectedSize = opt.dataset.size;
    });
  });

  // Quantity controls
  const qtyInput = document.getElementById('quantity');
  const decreaseBtn = document.getElementById('decrease');
  const increaseBtn = document.getElementById('increase');
  const maxStock = parseInt(qtyInput.max);

  decreaseBtn.addEventListener('click', () => {
    const currentValue = parseInt(qtyInput.value);
    if (currentValue > 1) {
      qtyInput.value = currentValue - 1;
    }
  });

  increaseBtn.addEventListener('click', () => {
    const currentValue = parseInt(qtyInput.value);
    if (currentValue < maxStock) {
      qtyInput.value = currentValue + 1;
    }
  });

  // Add to cart functionality
  const addToCartBtn = document.querySelector('.add-to-cart');

  addToCartBtn.addEventListener('click', () => {
    if (!selectedSize) {
      alert('Please select a size before adding to cart.');
      document.getElementById('sizeOptions').style.border = '2px solid #DC3545';
      setTimeout(() => {
        document.getElementById('sizeOptions').style.border = 'none';
      }, 2000);
      return;
    }

    const quantity = parseInt(qtyInput.value);
    const productName = '{{ $product->name }}';

    // Here you would typically make an AJAX call to add to cart
    // For now, we'll show a success message

    // Change button temporarily
    const originalHTML = addToCartBtn.innerHTML;
    addToCartBtn.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.5rem;">
        <polyline points="20 6 9 17 4 12"></polyline>
      </svg>
      Added to Cart!
    `;
    addToCartBtn.disabled = true;

    setTimeout(() => {
      addToCartBtn.innerHTML = originalHTML;
      addToCartBtn.disabled = false;
    }, 2000);

    console.log(`Added to cart: ${productName}, Size: ${selectedSize}, Quantity: ${quantity}`);
  });

  // Image zoom on hover
  const mainImage = document.getElementById('mainImage');

  mainImage.addEventListener('mouseenter', () => {
    mainImage.style.transform = 'scale(1.05)';
    mainImage.style.transition = 'transform 0.5s ease';
  });

  mainImage.addEventListener('mouseleave', () => {
    mainImage.style.transform = 'scale(1)';
  });
</script>
@endpush
