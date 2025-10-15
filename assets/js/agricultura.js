// JavaScript específico para la página de Agricultura

document.addEventListener('DOMContentLoaded', function() {
  // Carga inteligente del video hero para mejor rendimiento
  const heroVideo = document.getElementById('heroVideo');
  if (heroVideo) {
    // Cargar video solo cuando esté en viewport
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          heroVideo.load();
          observer.unobserve(heroVideo);
        }
      });
    });
    observer.observe(heroVideo);
    
    // Fallback: cargar después de 1 segundo si no está en viewport
    setTimeout(() => {
      if (heroVideo.readyState === 0) {
        heroVideo.load();
      }
    }, 1000);
  }

  // Animación de conteo para estadísticas
  initCounterAnimation();
});

/**
 * Inicializa la animación de conteo para las estadísticas
 */
function initCounterAnimation() {
  const statsSection = document.querySelector('.stats');
  if (!statsSection) return;

  const counters = document.querySelectorAll('.stat-number');
  if (counters.length === 0) return;

  // Intersection Observer para activar animación cuando la sección entra en viewport
  const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounters(counters);
        statsObserver.unobserve(entry.target); // Solo animar una vez
      }
    });
  }, {
    threshold: 0.3, // Activar cuando 30% de la sección sea visible
    rootMargin: '0px 0px -50px 0px' // Activar un poco antes de que esté completamente visible
  });

  statsObserver.observe(statsSection);
}

/**
 * Anima los contadores desde 0 hasta su valor final
 * @param {NodeList} counters - Lista de elementos .stat-number
 */
function animateCounters(counters) {
  counters.forEach((counter, index) => {
    // Agregar clase animate para la transición CSS
    const statItem = counter.closest('.stat-item');
    if (statItem) {
      setTimeout(() => {
        statItem.classList.add('animate');
      }, index * 200); // Staggered animation
    }

    // Extraer el valor numérico del texto
    const text = counter.textContent;
    const target = extractNumber(text);
    
    if (target > 0) {
      animateCounter(counter, target, text);
    }
  });
}

/**
 * Extrae el número de un string que puede contener símbolos como +, %, etc.
 * @param {string} text - Texto que contiene el número
 * @returns {number} - Número extraído
 */
function extractNumber(text) {
  const match = text.match(/(\d+)/);
  return match ? parseInt(match[1]) : 0;
}

/**
 * Anima un contador individual
 * @param {HTMLElement} element - Elemento del contador
 * @param {number} target - Valor objetivo
 * @param {string} originalText - Texto original con símbolos
 */
function animateCounter(element, target, originalText) {
  const duration = 2000; // 2 segundos
  const startTime = performance.now();
  const startValue = 0;
  
  // Extraer sufijo (+, %, etc.)
  const suffix = originalText.replace(/\d+/g, '');
  
  function updateCounter(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    
    // Easing function para animación suave
    const easeOutQuart = 1 - Math.pow(1 - progress, 4);
    const currentValue = Math.floor(startValue + (target - startValue) * easeOutQuart);
    
    element.textContent = currentValue + suffix;
    
    if (progress < 1) {
      requestAnimationFrame(updateCounter);
    } else {
      element.textContent = originalText; // Asegurar valor final exacto
    }
  }
  
  requestAnimationFrame(updateCounter);
}

// ===============================================
// ANIMACIONES DE SUSTENTABILIDAD
// ===============================================

// IntersectionObserver para animaciones de scroll
const sustentabilidadObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      
      // Animación escalonada para cards
      if (entry.target.classList.contains('sustentabilidad-card')) {
        const cards = document.querySelectorAll('.sustentabilidad-card');
        cards.forEach((card, index) => {
          setTimeout(() => {
            card.classList.add('visible');
          }, index * 150); // Delay escalonado de 150ms
        });
      }
    }
  });
}, {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
});

// Observar elementos de sustentabilidad
document.addEventListener('DOMContentLoaded', function() {
  // Cargar video de sustentabilidad
  const sustentabilidadVideo = document.querySelector('.sustentabilidad-video');
  if (sustentabilidadVideo) {
    sustentabilidadVideo.addEventListener('loadeddata', function() {
      console.log('Sustentabilidad video loaded successfully');
      this.play().catch(e => {
        console.log('Sustentabilidad video autoplay failed:', e);
      });
    });
    
    sustentabilidadVideo.addEventListener('error', function(e) {
      console.error('Sustentabilidad video error:', e);
      // Mostrar fallback si el video falla
      const fallback = this.nextElementSibling;
      if (fallback && fallback.classList.contains('sustentabilidad-fallback')) {
        fallback.style.display = 'block';
      }
    });
    
  // Cargar el video
  sustentabilidadVideo.load();
}

// Cargar video de transporte
const transporteVideo = document.querySelector('.transporte-video');
if (transporteVideo) {
  transporteVideo.addEventListener('loadeddata', function() {
    console.log('Transporte video loaded successfully');
    this.play().catch(e => {
      console.log('Transporte video autoplay failed:', e);
    });
  });
  
  transporteVideo.addEventListener('error', function(e) {
    console.error('Transporte video error:', e);
    // Mostrar fallback si el video falla
    const fallback = this.querySelector('.transporte-video-fallback');
    if (fallback) {
      fallback.style.display = 'flex';
    }
  });
  
  // Cargar el video
  transporteVideo.load();
}

  
  // Observar cards de sustentabilidad
  const sustentabilidadCards = document.querySelectorAll('.sustentabilidad-card');
  sustentabilidadCards.forEach(card => {
    sustentabilidadObserver.observe(card);
  });
  
  // Observar header de sustentabilidad
  const sustentabilidadHeader = document.querySelector('.sustentabilidad-header');
  if (sustentabilidadHeader) {
    sustentabilidadObserver.observe(sustentabilidadHeader);
  }
  
  // Observar highlight de sustentabilidad
  const sustentabilidadHighlight = document.querySelector('.sustentabilidad-highlight');
  if (sustentabilidadHighlight) {
    sustentabilidadObserver.observe(sustentabilidadHighlight);
  }
  
  // Observar cards de normativa
  const normativaCards = document.querySelectorAll('.normativa-card');
  normativaCards.forEach(card => {
    sustentabilidadObserver.observe(card);
  });
  
  // Observar header de normativa
  const normativaHeader = document.querySelector('.normativa-header');
  if (normativaHeader) {
    sustentabilidadObserver.observe(normativaHeader);
  }
});

// Animaciones adicionales para efectos hover
document.addEventListener('DOMContentLoaded', function() {
  const cards = document.querySelectorAll('.sustentabilidad-card, .normativa-card');
  
  cards.forEach(card => {
    // Efecto de parallax sutil en hover
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-8px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
    
    // Efecto de ripple al hacer click
    card.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(45, 80, 22, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
        z-index: 1;
      `;
      
      this.appendChild(ripple);
      
      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  });
});

// CSS para animación ripple
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
  @keyframes ripple {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }
`;
document.head.appendChild(rippleStyle);

// Animación de entrada para el título principal
document.addEventListener('DOMContentLoaded', function() {
  const title = document.querySelector('.sustentabilidad-title');
  if (title) {
    // Animación de escritura para el título
    const titleText = title.textContent;
    title.textContent = '';
    title.style.opacity = '1';
    
    let i = 0;
    const typeWriter = () => {
      if (i < titleText.length) {
        title.textContent += titleText.charAt(i);
        i++;
        setTimeout(typeWriter, 100);
      }
    };
    
    // Iniciar animación después de un pequeño delay
    setTimeout(typeWriter, 500);
  }
});

// Efecto de partículas flotantes en el header
document.addEventListener('DOMContentLoaded', function() {
  const header = document.querySelector('.sustentabilidad-header');
  if (header) {
    // Crear partículas flotantes
    for (let i = 0; i < 20; i++) {
      const particle = document.createElement('div');
      particle.style.cssText = `
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        pointer-events: none;
        animation: float ${3 + Math.random() * 4}s ease-in-out infinite;
        left: ${Math.random() * 100}%;
        top: ${Math.random() * 100}%;
        animation-delay: ${Math.random() * 2}s;
      `;
      header.appendChild(particle);
    }
  }
});

// CSS para animación de partículas
const particleStyle = document.createElement('style');
particleStyle.textContent = `
  @keyframes float {
    0%, 100% {
      transform: translateY(0px) rotate(0deg);
      opacity: 0.3;
    }
    50% {
      transform: translateY(-20px) rotate(180deg);
      opacity: 0.8;
    }
  }
`;
document.head.appendChild(particleStyle);