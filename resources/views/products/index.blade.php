
@extends('layouts.app')


@section('content')

    <!-- Hero Minimalista -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(10, 10, 10, 0.5), rgba(10, 10, 10, 0.5)), url('{{ asset('heroimg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="text-center hero-content">
                <div class="stats-badge">
                    <i class="fas fa-fire"></i>
                    <span>+120 productos disponibles</span>
                </div>
                <h1 class="hero-title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Explora, Descubre, Compra</h1>
                <p class="hero-subtitle" style="color: white; text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">Encuentra los mejores productos en un solo lugar</p>

                <form action="{{ route('products.index') }}" method="GET" class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" name="search" class="form-control search-input" placeholder="Buscar productos, marcas..." value="{{ request('search') }}">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Products Section -->
    <div class="container pb-5">
        @if(request('search'))
            <div class="search-results-info">
                <p>
                    <i class="fas fa-search"></i>
                    <span>Mostrando resultados para:</span>
                    <strong>{{ request('search') }}</strong>
                    <a href="{{ route('products.index') }}" class="clear-search">
                        <i class="fas fa-times"></i>
                        <span>Limpiar</span>
                    </a>
                </p>
            </div>
        @endif

        <div class="section-header">
            <h2 class="section-title">{{ request('search') ? 'Resultados de Búsqueda' : 'Productos Destacados' }}</h2>
            <button class="filter-btn" id="toggleFilters">
                <i class="fas fa-filter me-2"></i>Filtrar
            </button>
        </div>

        <!-- Filters Panel -->
        <div class="filters-panel {{ request()->hasAny(['category', 'brand', 'min_price', 'max_price']) ? '' : 'd-none' }}" id="filtersPanel">
            <form action="{{ route('products.index') }}" method="GET" id="filterForm">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <div class="row g-3">
                    <!-- Categoría -->
                    <div class="col-md-3">
                        <label class="filter-label">
                            <i class="fas fa-layer-group me-2"></i>Categoría
                        </label>
                        <select name="category" class="form-select filter-select">
                            <option value="">Todas las categorías</option>
                            @foreach(\App\Models\Category::all() as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Marca -->
                    <div class="col-md-3">
                        <label class="filter-label">
                            <i class="fas fa-certificate me-2"></i>Marca
                        </label>
                        <select name="brand" class="form-select filter-select">
                            <option value="">Todas las marcas</option>
                            @foreach(\App\Models\Brand::all() as $br)
                                <option value="{{ $br->id }}" {{ request('brand') == $br->id ? 'selected' : '' }}>
                                    {{ $br->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Precio Mínimo -->
                    <div class="col-md-2">
                        <label class="filter-label">
                            <i class="fas fa-dollar-sign me-2"></i>Precio Mín.
                        </label>
                        <input type="number" name="min_price" class="form-control filter-input" 
                               placeholder="0" step="0.01" value="{{ request('min_price') }}">
                    </div>

                    <!-- Precio Máximo -->
                    <div class="col-md-2">
                        <label class="filter-label">
                            <i class="fas fa-dollar-sign me-2"></i>Precio Máx.
                        </label>
                        <input type="number" name="max_price" class="form-control filter-input" 
                               placeholder="999999" step="0.01" value="{{ request('max_price') }}">
                    </div>

                    <!-- Botones -->
                    <div class="col-md-2 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="fas fa-search me-1"></i>Aplicar
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="row g-4 mt-2">
        @php
            $icons = [
                'fa-tshirt', 'fa-shoe-prints', 'fa-hat-cowboy', 'fa-glasses', 
                'fa-watch', 'fa-gem', 'fa-ring', 'fa-shopping-bag',
                'fa-crown', 'fa-gift', 'fa-heart', 'fa-star'
            ];
        @endphp
        @foreach ($products as $index => $product)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="product-card" onclick="window.location.href='{{ url('/products/'.$product->id) }}'">
                    <div class="product-image">
                        <span class="product-badge">{{ $product->brand->name ?? 'Sin marca' }}</span>
                        <i class="fas {{ $icons[$index % count($icons)] }}"></i>
                    </div>
                    <div class="product-body">
                        <h5 class="product-name">{{ $product->name }}</h5>
                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                        <div class="product-footer">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>{{ number_format(rand(40, 50) / 10, 1) }}</span>
                            </div>
                            <button class="btn-view">
                                Ver más <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links() }}
        </div>
    </div>

    <!-- JavaScript para Toggle de Filtros -->
    <script>
        document.getElementById('toggleFilters').addEventListener('click', function() {
            const panel = document.getElementById('filtersPanel');
            panel.classList.toggle('d-none');
            this.classList.toggle('active');
        });
    </script>
@endsection
