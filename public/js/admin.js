/**
 * Admin Luxury Styles Enforcer
 * Fuerza los estilos después de que se cargue todo
 */

document.addEventListener('DOMContentLoaded', function() {
    // Esperar a que TODO se cargue
    setTimeout(function() {
        enforceStyles();
    }, 100);
    
    // También al cargar la ventana
    window.addEventListener('load', function() {
        setTimeout(function() {
            enforceStyles();
        }, 100);
    });
});

function enforceStyles() {
    // Forzar estilos en las tarjetas
    const statCards = document.querySelectorAll('.luxury-stat-card');
    
    statCards.forEach(card => {
        // Resetear estilos de la tarjeta
        card.style.cssText = `
            background: #FFFFFF !important;
            background-color: #FFFFFF !important;
            background-image: none !important;
            border: none !important;
            border-radius: 0 !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08) !important;
        `;
        
        // Forzar body de la tarjeta
        const body = card.querySelector('.stat-card-body');
        if (body) {
            body.style.cssText = `
                padding: 2.5rem !important;
                background: transparent !important;
            `;
        }
        
        // Forzar icono wrapper
        const iconWrapper = card.querySelector('.stat-icon-wrapper');
        if (iconWrapper) {
            iconWrapper.style.cssText = `
                width: 60px !important;
                height: 60px !important;
                background: linear-gradient(135deg, #F5F4F0 0%, #E8E5DC 100%) !important;
                border: 1px solid rgba(184,175,164,0.3) !important;
                border-radius: 0 !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
            `;
            
            // Forzar icono
            const icon = iconWrapper.querySelector('i, .material-symbols-rounded');
            if (icon) {
                icon.style.cssText = `
                    color: #2C2C2C !important;
                    background: transparent !important;
                    -webkit-text-fill-color: #2C2C2C !important;
                    background-clip: unset !important;
                    -webkit-background-clip: unset !important;
                `;
            }
        }
        
        // Forzar label
        const label = card.querySelector('.stat-label');
        if (label) {
            label.style.cssText = `
                color: #8B7E74 !important;
                font-size: 0.75rem !important;
                letter-spacing: 2px !important;
                text-transform: uppercase !important;
                opacity: 1 !important;
            `;
        }
        
        // Forzar value
        const value = card.querySelector('.stat-value');
        if (value) {
            value.style.cssText = `
                font-size: 2.5rem !important;
                font-weight: 300 !important;
                color: #0A0A0A !important;
                opacity: 1 !important;
            `;
        }
        
        // Forzar footer
        const footer = card.querySelector('.stat-card-footer');
        if (footer) {
            footer.style.cssText = `
                padding-top: 1.5rem !important;
                border-top: 1px solid #E8E5DC !important;
                background: transparent !important;
            `;
        }
        
        // Forzar trend
        const trend = card.querySelector('.stat-trend');
        if (trend) {
            trend.style.cssText = `
                color: #8B7E74 !important;
                font-size: 0.85rem !important;
                opacity: 1 !important;
            `;
        }
    });
    
    // Limpiar observer de Material Dashboard si existe
    if (window.MutationObserver) {
        const observers = document.querySelectorAll('*');
        observers.forEach(el => {
            if (el._observers) {
                delete el._observers;
            }
        });
    }
}

// Sidebar toggle para móvil
const iconNavbar = document.getElementById('iconNavbarSidenav');
const sidenav = document.getElementById('sidenav-main');

if (iconNavbar && sidenav) {
    iconNavbar.addEventListener('click', function() {
        sidenav.classList.toggle('show');
    });
}