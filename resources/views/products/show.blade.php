@extends('layouts.app')



@section('content')
    <!-- Product Detail -->
    <div class="product-container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ url('/products') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/products') }}">Productos</a></li>
                <li class="breadcrumb-item active">iPhone 15 Pro Max</li>
            </ol>
        </nav>

        <div class="product-detail-card">
            <div class="row g-0">
                <!-- Image Section -->
                <div class="col-lg-6">
                    <div class="image-section">
                        <span class="image-badge">
                            <i class="fas fa-camera me-2"></i>Vista Principal
                        </span>
                        <div class="product-image-placeholder">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="col-lg-6">
                    <div class="info-section">
                        <!-- Brand Badge -->
                        <span class="product-brand-badge">
                            <i class="fas fa-apple-alt"></i>
                            Apple
                        </span>

                        <!-- Product Name -->
                        <h1 class="product-title">iPhone 15 Pro Max 256GB</h1>

                        <!-- Rating -->
                        <div class="product-rating-section">
                            <div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="rating-text">4.9 (2,458 reviews)</span>
                        </div>

                        <!-- Stock -->
                        <div class="stock-badge">
                            <i class="fas fa-check-circle"></i>
                            Disponible en Stock
                        </div>

                        <!-- Price -->
                        <div class="product-price-display">
                            $1,199
                            <span class="price-original">$1,399</span>
                        </div>

                        <!-- Features Grid -->
                        <div class="features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-truck-fast"></i>
                                </div>
                                <div class="feature-text">Envío Gratis</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-halved"></i>
                                </div>
                                <div class="feature-text">Garantía 1 Año</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-rotate-left"></i>
                                </div>
                                <div class="feature-text">30 Días Devolución</div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="description-section">
                            <h3 class="section-title">
                                <i class="fas fa-align-left"></i>
                                Descripción del Producto
                            </h3>
                            <div class="product-description">
                                El iPhone 15 Pro Max redefine la innovación móvil. Equipado con el revolucionario chip A17 Pro, cámara de 48MP con zoom óptico 5x y pantalla Super Retina XDR de 6.7 pulgadas con tecnología ProMotion.
                                <br><br>
                                Diseñado con titanio aeroespacial para máxima durabilidad y ligereza extraordinaria. El nuevo botón de Acción personalizable te da control total sobre tus funciones favoritas. Puerto USB-C con velocidades de transferencia ultrarrápidas hasta 10 Gbps.
                                <br><br>
                                Resistencia al agua IP68, Face ID avanzado y batería de larga duración que te acompaña todo el día.
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ url('/products') }}" class="btn-back">
                                <i class="fas fa-arrow-left"></i>
                                Volver
                            </a>
                            <button class="btn-add-cart" disabled>
                                <i class="fas fa-shopping-cart"></i>
                                Añadir al Carrito
                            </button>
                        </div>

                        <div class="demo-notice">
                            <i class="fas fa-info-circle"></i>
                            Funcionalidad de carrito en desarrollo
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
