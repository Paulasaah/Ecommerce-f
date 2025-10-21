<nav class="navbar" id="navbar">
    <a href="{{ route('products.index') }}" class="logo">LUXE</a>

    <ul class="nav-links" id="navLinks">
        <li><a href="{{ route('products.index') }}">Collection</a></li>
        <li><a href="{{ route('products.index') }}">Women</a></li>
        <li><a href="{{ route('products.index') }}">Men</a></li>
        <li><a href="{{ route('products.index') }}">Accessories</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>

    <div class="nav-icons">
        <!-- Search Icon -->
        <a href="{{ route('products.search') }}" aria-label="Search" title="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
        </a>

        <!-- User Icon - Conditional -->
        @guest
            <a href="{{ route('login') }}" class="icon-link" aria-label="Sign In" title="Sign In">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
        @else
            <a href="{{ route('home') }}" class="icon-link" aria-label="My Account" title="My Account">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
        @endguest

        <!-- Shopping Bag Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-label="Shopping Bag">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
            <path d="M3 6h18"></path>
            <path d="M16 10a4 4 0 0 1-8 0"></path>
        </svg>
    </div>

    <!-- Hamburger Menu Button for Mobile -->
    <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

@push('scripts')
<script>
    // Navbar scroll effect with performance optimization
    let lastScrollY = window.scrollY;
    let ticking = false;

    function updateNavbar() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        ticking = false;
    }

    window.addEventListener('scroll', function() {
        lastScrollY = window.scrollY;
        if (!ticking) {
            window.requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    });

    // Mobile menu toggle with accessibility
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    const navbar = document.getElementById('navbar');

    hamburger.addEventListener('click', function() {
        const isActive = navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
        navbar.classList.toggle('menu-open');

        // Update ARIA attribute
        hamburger.setAttribute('aria-expanded', isActive);

        // Prevent body scroll when menu is open
        document.body.style.overflow = isActive ? 'hidden' : '';
    });

    // Close menu when clicking on a link
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', function() {
            navLinks.classList.remove('active');
            hamburger.classList.remove('active');
            navbar.classList.remove('menu-open');
            hamburger.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!navbar.contains(event.target) && navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
            hamburger.classList.remove('active');
            navbar.classList.remove('menu-open');
            hamburger.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    });

    // Close menu on ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
            hamburger.classList.remove('active');
            navbar.classList.remove('menu-open');
            hamburger.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    });

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            if (window.innerWidth > 768 && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
                navbar.classList.remove('menu-open');
                hamburger.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        }, 250);
    });
</script>
@endpush
