// JavaScript específico para la página de inicio (index.php)

document.addEventListener('DOMContentLoaded', function() {
  // Carga inteligente del video hero
  const heroVideo = document.querySelector('.hero video');
  if (heroVideo) {
    const heroObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          heroVideo.load();
          heroObserver.unobserve(heroVideo);
        }
      });
    });
    heroObserver.observe(heroVideo);
    
    // Fallback para el video hero
    setTimeout(() => {
      if (heroVideo.readyState === 0) {
        heroVideo.load();
      }
    }, 1000);
  }
  
  // Carga inteligente del video de estadísticas
  const statsVideo = document.querySelector('.stats video');
  if (statsVideo) {
    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          statsVideo.load();
          statsObserver.unobserve(statsVideo);
        }
      });
    });
    statsObserver.observe(statsVideo);
    
    // Fallback para el video de estadísticas
    setTimeout(() => {
      if (statsVideo.readyState === 0) {
        statsVideo.load();
      }
    }, 2000);
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
