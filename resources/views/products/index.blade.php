
@extends('layouts.app')


@section('content')

    <!-- Hero Minimalista -->
    <section class="hero-section">
        <div class="container">
            <div class="text-center hero-content">
                <div class="stats-badge">
                    <i class="fas fa-fire"></i>
                    <span>+120 productos disponibles</span>
                </div>
                <h1 class="hero-title">Explora, Descubre, Compra</h1>
                <p class="hero-subtitle">Encuentra los mejores productos en un solo lugar</p>

                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Buscar productos, marcas...">
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Products Section -->
    <div class="container pb-5">
        <div class="section-header">
            <h2 class="section-title">Productos Destacados</h2>
            <button class="filter-btn">
                <i class="fas fa-filter me-2"></i>Filtrar
            </button>
        </div>

        <div class="row g-4">
            <!-- Product Card 1 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="product-card" onclick="window.location.href='{{ url('/products/1') }}'">
                    <div class="product-image">
                        <span class="product-badge">Nike</span>
                        <i class="fas fa-shoe-prints"></i>
                    </div>
                    <div class="product-body">
                        <h5 class="product-name">Air Max 270 React</h5>
                        <div class="product-price">$129.99</div>
                        <div class="product-footer">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>4.8</span>
                            </div>
                            <button class="btn-view">
                                Ver más <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="product-card" onclick="window.location.href='{{ url('/products/2') }}'">
                    <div class="product-image">
                        <span class="product-badge">Apple</span>
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="product-body">
                        <h5 class="product-name">iPhone 15 Pro Max 256GB</h5>
                        <div class="product-price">$1,199</div>
                        <div class="product-footer">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>4.9</span>
                            </div>
                            <button class="btn-view">
                                Ver más <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="product-card" onclick="window.location.href='{{ url('/products/3') }}'">
                    <div class="product-image">
                        <span class="product-badge">Sony</span>
                        <i class="fas fa-headphones"></i>
                    </div>
                    <div class="product-body">
                        <h5 class="product-name">WH-1000XM5 Premium</h5>
                        <div class="product-price">$399.99</div>
                        <div class="product-footer">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>5.0</span>
                            </div>
                            <button class="btn-view">
                                Ver más <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="product-card" onclick="window.location.href='{{ url('/products/4') }}'">
                    <div class="product-image">
                        <span class="product-badge">Samsung</span>
                        <i class="fas fa-tv"></i>
                    </div>
                    <div class="product-body">
                        <h5 class="product-name">Smart TV 55" QLED 4K</h5>
                        <div class="product-price">$899</div>
                        <div class="product-footer">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>4.7</span>
                            </div>
                            <button class="btn-view">
                                Ver más <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State (comentado, descomentar si no hay productos) -->
        <!--
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h3>No hay productos disponibles</h3>
            <p>Sé el primero en agregar un producto increíble a tu tienda</p>
            <a href="{{ url('/products/create') }}" class="btn btn-create">
                <i class="fas fa-plus me-2"></i>Crear Primer Producto
            </a>
        </div>
        -->
    </div>
@endsection
