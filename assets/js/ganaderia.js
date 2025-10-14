// JavaScript específico para la página de Ganadería

document.addEventListener('DOMContentLoaded', function() {
  // Carga y reproducción de videos con manejo de errores
  const heroVideo = document.getElementById('heroVideo');
  if (heroVideo) {
    // Configurar eventos del video hero
    heroVideo.addEventListener('loadeddata', function() {
      console.log('Hero video loaded successfully');
      this.play().catch(e => {
        console.log('Hero video autoplay failed, trying user interaction:', e);
        // Mostrar botón de play si falla el autoplay
        showPlayButton(this);
      });
    });
    
    heroVideo.addEventListener('error', function(e) {
      console.error('Hero video error:', e);
      // Mostrar imagen de fallback
      this.style.display = 'none';
      const fallback = this.nextElementSibling;
      if (fallback && fallback.tagName === 'IMG') {
        fallback.style.display = 'block';
      }
    });
    
    // Cargar el video
    heroVideo.load();
  }
  
  // Video de estadísticas
  const statsVideo = document.querySelector('.stats video');
  if (statsVideo) {
    statsVideo.addEventListener('loadeddata', function() {
      console.log('Stats video loaded successfully');
      this.play().catch(e => {
        console.log('Stats video autoplay failed:', e);
      });
    });
    
    statsVideo.addEventListener('error', function(e) {
      console.error('Stats video error:', e);
    });
    
    // Cargar el video
    statsVideo.load();
  }

  // Animación de conteo para estadísticas
  initCounterAnimation();
});

/**
 * Muestra un botón de play si el autoplay falla
 */
function showPlayButton(video) {
  const playButton = document.createElement('button');
  playButton.innerHTML = '▶️';
  playButton.style.cssText = `
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,0.8);
    border: none;
    border-radius: 50%;
    width: 80px;
    height: 80px;
    color: white;
    font-size: 24px;
    cursor: pointer;
    z-index: 10;
  `;
  
  playButton.addEventListener('click', function() {
    video.play();
    this.remove();
  });
  
  video.parentElement.appendChild(playButton);
}

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
