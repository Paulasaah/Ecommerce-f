<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/LogoUNAB/logo_tiny.png') }}">
  <title>Admin - UnabShop</title>
  
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  
  <!-- Material Dashboard CSS (Base styles) -->
  <link href="{{ asset('assets/css/material-dashboard.min.css') }}?v=3.1.0" rel="stylesheet" />
  
  <!-- CSS personalizado admin (Sobrescribe Material Dashboard) -->
  <link href="{{ asset('css/admin.css') }}?v={{ time() }}" rel="stylesheet" />

</head>

<body class="g-sidenav-show bg-gray-100">
  
  <!-- Sidebar -->
  @include('admin.layouts.aside')
  <!-- End Sidebar -->
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    @include('admin.layouts.navbar')
    <!-- End Navbar -->
    
    <div class="container-fluid py-2">
      <!-- CONTENT -->
      @yield('content')
      <!-- End CONTENT -->

      <!-- FOOTER -->
      @include('admin.layouts.footer')
      <!-- End FOOTER -->
    </div>
  </main>

  <!-- Core JS Files -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  
  <!-- Material Dashboard JS -->
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/material-dashboard.min.js') }}?v=3.1.0"></script>
  
  <!-- Admin Enhanced Scripts -->
  <script>
    // Sidebar toggle con animación mejorada
    document.addEventListener('DOMContentLoaded', function() {
      const iconNavbar = document.getElementById('iconNavbarSidenav');
      const sidenav = document.getElementById('sidenav-main');
      const body = document.body;
      
      if (iconNavbar && sidenav) {
        iconNavbar.addEventListener('click', function() {
          sidenav.classList.toggle('show');
          body.classList.toggle('sidebar-open');
        });
      }

      // Agregar efecto de carga suave
      setTimeout(() => {
        document.body.style.opacity = '1';
      }, 100);

      // Contador animado para valores numéricos
      const animateValue = (element, start, end, duration) => {
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
          current += increment;
          if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
            current = end;
            clearInterval(timer);
          }
          
          // Formatear números con comas
          const formatted = Math.floor(current).toLocaleString();
          element.textContent = element.textContent.includes('$') 
            ? '$' + formatted 
            : formatted;
        }, 16);
      };

      // Observador de intersección para animaciones al scroll
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, observerOptions);

      // Observar elementos que deben animarse
      document.querySelectorAll('.card, .luxury-stat-card').forEach(el => {
        observer.observe(el);
      });
    });

    // Smooth scroll para navegación
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>
</body>

</html>