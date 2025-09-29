<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHub - Tu Tienda Online</title>

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

        .btn-create {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            border: none;
            padding: 0.7rem 1.8rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35);
            color: white;
        }

        /* Hero Minimalista */
        .hero-section {
            background: white;
            padding: 4rem 0 3rem 0;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, #667eea10 0%, #764ba210 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-weight: 800;
            font-size: 3rem;
            color: #1a202c;
            margin-bottom: 0.8rem;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            color: #718096;
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            font-weight: 400;
        }

        .search-box {
            max-width: 550px;
            margin: 0 auto;
            position: relative;
        }

        .search-input {
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            padding: 1rem 1.2rem 1rem 3.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafbfc;
        }

        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.08);
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #cbd5e0;
            font-size: 1.1rem;
        }

        /* Stats Badge */
        .stats-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #f7fafc;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: #4a5568;
        }

        .stats-badge i {
            color: #667eea;
        }

        /* Product Cards Minimalistas */
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            height: 100%;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            border-color: #cbd5e0;
        }

        .product-image {
            width: 100%;
            height: 260px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e0;
            font-size: 4rem;
            position: relative;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: white;
            color: #667eea;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .product-body {
            padding: 1.5rem;
        }

        .product-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #1a202c;
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.6rem;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.6rem;
            color: #1a202c;
            margin-bottom: 1rem;
        }

        .product-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid #f7fafc;
        }

        .btn-view {
            background: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-view:hover {
            background: #667eea;
            color: white;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            color: #fbbf24;
            font-size: 0.9rem;
        }

        /* Empty State Minimalista */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: 20px;
            border: 2px dashed #e2e8f0;
        }

        .empty-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem auto;
        }

        .empty-icon i {
            font-size: 3rem;
            color: #cbd5e0;
        }

        .empty-state h3 {
            color: #2d3748;
            font-weight: 700;
            margin-bottom: 0.8rem;
            font-size: 1.5rem;
        }

        .empty-state p {
            color: #a0aec0;
            margin-bottom: 2rem;
        }

        /* Section Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #1a202c;
        }

        .filter-btn {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #4a5568;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            border-color: #667eea;
            color: #667eea;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .product-image {
                height: 200px;
            }

            .section-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Minimalista -->
    <nav class="navbar navbar-custom">
        <div class="container">
            <a href="{{ url('/products') }}" class="logo-container">
                <div class="logo-icon">S</div>
                <span class="logo-text">ShopHub</span>
            </a>
            <a href="{{ url('/products/create') }}" class="btn btn-create">
                <i class="fas fa-plus me-2"></i>Nuevo Producto
            </a>
        </div>
    </nav>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
