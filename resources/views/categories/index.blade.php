{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Categories — LUXE Colombia')

@section('content')
  <div class="section-title" style="margin-top:1.5rem;">
    <p class="section-label">Shop by</p>
    <h2>Categories</h2>
    <p style="text-align:center;max-width:600px;margin:1rem auto 0;color:#666;">
      Discover timeless pieces crafted with Colombian passion and European elegance
    </p>
  </div>

  @php
    // Mapeo opcional de imágenes por nombre (útil si la tabla category no tiene image_url)
    $catImages = [
      'Women'           => 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=800&q=85',
      'Men'             => 'https://images.unsplash.com/photo-1490578474895-699cd4e2cf59?w=800&q=85',
      'Accessories'     => 'https://images.unsplash.com/photo-1492707892479-7bc8d5a4ee93?w=800&q=85',
      'Limited Edition' => 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=800&q=85',
      'Bags'            => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800&q=85',
      'Shoes'           => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&q=85',
      'Jewelry'         => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800&q=85',
      'Fragrances'      => 'https://images.unsplash.com/photo-1520975594089-5933c2ad2b2a?w=800&q=85',
    ];
  @endphp

  <div class="categories-grid">
    @forelse ($category as $cat)
      @php
        // Si tu tabla tiene image_url, cámbialo por: $img = $category->image_url ?? ...
        $img = $catImages[$category->name] ?? $catImages['Accessories'];
      @endphp

      <a href="{{ route('categories.show', $category->id) }}" class="category-card">
        <img src="{{ $img }}" alt="{{ $category->name }}" class="category-image">
        <div class="category-overlay">
          <p class="category-label">Explore Collection</p>
          <h3 class="category-title">{{ $category->name }}</h3>
          <span class="category-cta">Discover →</span>
        </div>
      </a>
    @empty
      <p class="text-center text-muted" style="grid-column:1 / -1;">
        No hay categorías para mostrar.
      </p>
    @endforelse
  </div>
@endsection
