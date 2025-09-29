<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto - ShopHub</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #fafbfc;
            min-height: 100vh;
        }

        /* Navbar Minimalista */
        .navbar-custom {
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
            padding: 1rem 0;
            margin-bottom: 3rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 1.2rem;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .logo-text {
            font-weight: 700;
            font-size: 1.4rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-back-nav {
            background: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            border: 1px solid #e2e8f0;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-back-nav:hover {
            background: white;
            border-color: #cbd5e0;
            color: #2d3748;
        }

        /* Product Container */
        .product-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem 3rem 1rem;
        }

        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin-bottom: 2rem;
        }

        .breadcrumb-custom a {
            color: #a0aec0;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .breadcrumb-custom a:hover {
            color: #667eea;
        }

        .breadcrumb-custom .active {
            color: #2d3748;
            font-weight: 500;
        }

        .product-detail-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
        }

        /* Image Section */
        .image-section {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 550px;
            padding: 3rem;
            position: relative;
        }

        .product-image-placeholder {
            width: 100%;
            max-width: 400px;
            aspect-ratio: 1;
            background: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e0;
            font-size: 6rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        }

        .image-badge {
            position: absolute;
            top: 2rem;
            left: 2rem;
            background: white;
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            font-weight: 600;
            color: #2d3748;
            font-size: 0.9rem;
        }

        /* Info Section */
        .info-section {
            padding: 3rem;
        }

        .product-brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.5rem;
        }

        .product-title {
            font-weight: 800;
            font-size: 2.5rem;
            color: #1a202c;
            margin-bottom: 1rem;
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .product-rating-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .rating-stars {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            color: #fbbf24;
            font-size: 1.1rem;
        }

        .rating-text {
            color: #718096;
            font-size: 0.95rem;
        }

        .product-price-display {
            font-weight: 800;
            font-size: 3.5rem;
            color: #1a202c;
            margin-bottom: 2rem;
            letter-spacing: -2px;
        }

        .price-original {
            font-size: 1.5rem;
            color: #a0aec0;
            text-decoration: line-through;
            font-weight: 500;
            margin-left: 1rem;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 2.5rem;
            padding: 1.5rem;
            background: #f7fafc;
            border-radius: 16px;
        }

        .feature-item {
            text-align: center;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.8rem auto;
            color: #667eea;
            font-size: 1.3rem;
        }

        .feature-text {
            font-size: 0.85rem;
            color: #4a5568;
            font-weight: 600;
        }

        /* Description */
        .description-section {
            margin-bottom: 2.5rem;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.2rem;
            color: #1a202c;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .section-title i {
            color: #667eea;
        }

        .product-description {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.8;
            padding: 1.5rem;
            background: #f7fafc;
            border-radius: 16px;
            border-left: 4px solid #667eea;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #f7fafc;
        }

        .btn-add-cart {
            flex: 2;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 700;
            border: none;
            padding: 1.2rem;
            border-radius: 14px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
        }

        .btn-add-cart:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-add-cart:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-back {
            flex: 1;
            background: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            border: 2px solid #e2e8f0;
            padding: 1.2rem;
            border-radius: 14px;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-back:hover {
            background: white;
            border-color: #cbd5e0;
            color: #2d3748;
        }

        .demo-notice {
            text-align: center;
            margin-top: 1.5rem;
            padding: 1rem;
            background: #fef3c7;
            border-radius: 12px;
            color: #92400e;
            font-size: 0.9rem;
        }

        .demo-notice i {
            margin-right: 0.5rem;
        }

        /* Stock Badge */
        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #d1fae5;
            color: #065f46;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .stock-badge i {
            color: #10b981;
        }

        @media (max-width: 992px) {
            .image-section {
                min-height: 450px;
            }

            .info-section {
                padding: 2rem;
            }

            .product-title {
                font-size: 2rem;
            }

            .product-price-display {
                font-size: 2.8rem;
            }

            .features-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .image-section {
                min-height: 350px;
                padding: 2rem;
            }

            .product-title {
                font-size: 1.75rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom">
        <div class="container">
            <a href="{{ url('/products') }}" class="logo-container">
                <div class="logo-icon">S</div>
                <span class="logo-text">ShopHub</span>
            </a>
            <a href="{{ url('/products') }}" class="btn-back-nav">
                <i class="fas fa-arrow-left me-2"></i>Volver al Catálogo
            </a>
        </div>
    </nav>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
