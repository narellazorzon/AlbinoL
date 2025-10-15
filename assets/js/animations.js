// Albino Luis Zorzon - Animaciones No Críticas
// Este archivo se carga de forma diferida para mejorar LCP

// Efecto parallax suave para el hero (no crítico)
function initParallax() {
    const hero = document.querySelector('.hero');
    if (hero) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });
    }
}

// Botón de scroll to top (no crítico)
function initScrollToTop() {
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.innerHTML = '↑';
    scrollToTopBtn.className = 'scroll-to-top';
    scrollToTopBtn.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--accent-green);
        color: white;
        border: none;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    `;
    
    document.body.appendChild(scrollToTopBtn);

    // Mostrar/ocultar botón de scroll to top
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.style.opacity = '1';
        } else {
            scrollToTopBtn.style.opacity = '0';
        }
    });

    // Funcionalidad del botón scroll to top
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Efecto de typing para el título principal (no crítico)
function initTypeWriter() {
    const heroTitle = document.querySelector('.hero h1');
    if (heroTitle) {
        const text = heroTitle.textContent;
        heroTitle.textContent = '';
        let i = 0;
        const typeWriter = () => {
            if (i < text.length) {
                heroTitle.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        };
        setTimeout(typeWriter, 500);
    }
}

// Cargar validación del formulario de contacto (no crítico)
function loadFormValidation() {
    if (document.querySelector('form[action="enviar-mensaje.php"]')) {
        const script = document.createElement('script');
        script.src = 'assets/js/form-validation.js';
        script.async = true;
        document.head.appendChild(script);
    }
}

// Inicializar todas las animaciones no críticas
document.addEventListener('DOMContentLoaded', function() {
    // Usar requestIdleCallback para cargar animaciones cuando el navegador esté libre
    if ('requestIdleCallback' in window) {
        requestIdleCallback(() => {
            initParallax();
            initScrollToTop();
            initTypeWriter();
            loadFormValidation();
        });
    } else {
        // Fallback para navegadores que no soportan requestIdleCallback
        setTimeout(() => {
            initParallax();
            initScrollToTop();
            initTypeWriter();
            loadFormValidation();
        }, 100);
    }
});

// Mensaje de bienvenida (no crítico)
console.log(`
🌾🌱🐄🚜
Bienvenido a Albino Luis Zorzon
Empresa familiar de producción agropecuaria
🌾🌱🐄🚜
`);
