// JavaScript específico para la página de Ganadería

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
  
  // Carga inteligente del video de números ganaderos
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
});
