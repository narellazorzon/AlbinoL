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
});
