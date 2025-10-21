<!-- Navbar Minimalista y Elegante -->
<nav class="navbar-custom">
    <div class="container">
        <!-- Logo -->
        <a href="{{ url('/products') }}" class="logo-container">
            <div class="logo-icon">L</div>
            <span class="logo-text">LUXE</span>
        </a>

        <!-- Navegación Central (Desktop) -->
        <div class="nav-links d-none d-lg-flex">
            <a href="{{ url('/products') }}" class="nav-link-custom {{ Request::is('products') ? 'active' : '' }}">
                Colección
            </a>
            <a href="{{ url('/products') }}" class="nav-link-custom">
                Mujer
            </a>
            <a href="{{ url('/products') }}" class="nav-link-custom">
                Hombre
            </a>
            <a href="{{ url('/products') }}" class="nav-link-custom">
                Accesorios
            </a>
            <a href="#" class="nav-link-custom">
                Sobre Nosotros
            </a>
        </div>

        <!-- Acciones de Usuario -->
        <div class="navbar-actions">
            <!-- Buscador (Icon) -->
            <button class="action-icon d-none d-md-flex" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fas fa-search"></i>
            </button>

            <!-- Usuario -->
            @guest
                <a href="{{ route('login') }}" class="action-icon d-none d-md-flex" title="Iniciar Sesión">
                    <i class="fas fa-user"></i>
                </a>
            @else
                <div class="dropdown">
                    <button class="action-icon dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-luxe" aria-labelledby="userDropdown">
                        <li class="dropdown-header">
                            <strong>{{ Auth::user()->name }}</strong>
                            <small class="d-block text-muted">{{ Auth::user()->email }}</small>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user me-2"></i>Mi Perfil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-box me-2"></i>Mis Pedidos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-heart me-2"></i>Favoritos
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest

            <!-- Carrito -->
            <button class="action-icon d-none d-md-flex position-relative" title="Carrito">
                <i class="fas fa-shopping-bag"></i>
                <span class="cart-badge">0</span>
            </button>

            <!-- Botón Crear Producto -->
            <a href="{{ url('/products/create') }}" class="btn btn-create d-none d-lg-inline-flex">
                <i class="fas fa-plus me-2"></i>Nuevo Producto
            </a>

            <!-- Menú Mobile -->
            <button class="action-icon d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Modal de Búsqueda -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content search-modal">
            <div class="modal-body p-0">
                <div class="search-modal-input">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Buscar productos, marcas, categorías..." autofocus>
                    <button type="button" class="btn-close-search" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="search-suggestions">
                    <div class="suggestion-title">Búsquedas populares</div>
                    <a href="#" class="suggestion-item">
                        <i class="fas fa-fire text-warning me-2"></i>Vestidos de noche
                    </a>
                    <a href="#" class="suggestion-item">
                        <i class="fas fa-star text-warning me-2"></i>Accesorios de lujo
                    </a>
                    <a href="#" class="suggestion-item">
                        <i class="fas fa-tag text-warning me-2"></i>Ofertas exclusivas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offcanvas Mobile Menu -->
<div class="offcanvas offcanvas-end offcanvas-luxe" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <div class="logo-container">
            <div class="logo-icon">L</div>
            <span class="logo-text">LUXE</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
