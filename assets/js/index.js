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
});
