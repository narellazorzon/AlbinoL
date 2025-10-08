<?php
require_once __DIR__ . '/../includes/config.php';

$title = "Ganadería - Albino Luis Zorzon";
$desc = "Cría y engorde de ganado bovino con manejo integral y alimentación balanceada.";
include __DIR__ . "/../partials/header.php";
?>

<!-- Hero Section -->
<div class="hero fade-in-up">
  <video id="heroVideo" autoplay muted loop playsinline preload="none" poster="../assets/images/logo.png">
    <source src="../assets/videos/recopilacion_ganaderia.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    Tu navegador no soporta videos HTML5.
  </video>
  <div class="hero-content">
    <h1>Ganadería</h1>
    <p>Cría y engorde de ganado bovino con manejo integral y alimentación balanceada</p>
  </div>
</div>

<!-- Servicios Ganaderos -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en ganadería -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.08; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 100px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestras Actividades Ganaderas</h2>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">🐂</span>
      <h3>Cría de Ganado</h3>
      <p>Selección y cría de reproductores de alta calidad genética para mejorar la producción.</p>
      <ul style="text-align: left; margin-top: 1rem;">
        <li>Selección genética</li>
        <li>Reproducción controlada</li>
        <li>Registro genealógico</li>
      </ul>
    </div>
    <div class="card">
      <span class="card-icon">🌾</span>
      <h3>Engorde a Corral</h3>
      <p>Sistema de engorde intensivo con alimentación balanceada y control sanitario.</p>
      <ul style="text-align: left; margin-top: 1rem;">
        <li>Alimentación balanceada</li>
        <li>Control sanitario</li>
        <li>Manejo del estrés</li>
      </ul>
    </div>
    <div class="card">
      <span class="card-icon">🌱</span>
      <h3>Pastoreo Rotativo</h3>
      <p>Sistema de pastoreo que optimiza el uso del forraje y mantiene la calidad del pasto.</p>
      <ul style="text-align: left; margin-top: 1rem;">
        <li>Rotación de potreros</li>
        <li>Mejora de pasturas</li>
        <li>Conservación del suelo</li>
      </ul>
    </div>
  </div>
</section>

<!-- Razas -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en razas -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 80px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Razas que Trabajamos</h2>
  <div class="cards-grid">
  <div class="card">
      <span class="card-icon">🐃</span>
      <h3>Brangus</h3>
      <p>Híbrido entre Angus y Brahman, combina calidad de carne con resistencia al calor.</p>
    </div>
  <div class="card">
      <span class="card-icon">🐄</span>
      <h3>Angus</h3>
      <p>Raza británica conocida por su excelente calidad de carne y adaptabilidad al clima.</p>
    </div>
    <div class="card">
      <span class="card-icon">🐂</span>
      <h3>Braford</h3>
      <p>Híbrido entre Brahman y Hereford, combina resistencia al calor con buena calidad de carne.</p>
    </div>

  </div>
</section>

<!-- Estadísticas Ganaderas -->
<div class="stats fade-in-up" style="position: relative; overflow: hidden;">
  <!-- Video de fondo para números ganaderos -->
  <video autoplay muted loop playsinline preload="none" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; opacity: 0.6; filter: saturate(0.7) contrast(1.2) brightness(0.9);">
    <source src="../assets/videos/numeros_ganaderos.MP4" type="video/mp4">
    Tu navegador no soporta videos HTML5.
  </video>
  
  <!-- Overlay para mejorar contraste del texto -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(20deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 20%, rgba(0,0,0,0.2) 90%); z-index: 1.5;"></div>
  
  <!-- Contenido sobre el video -->
  <div style="position: relative; z-index: 2;">
    <h2>Nuestros Números Ganaderos</h2>
    <div class="stats-grid">
    <div class="stat-item">
      <span class="stat-number">3000+</span>
      <span class="stat-label">Cabezas de Ganado</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">3</span>
      <span class="stat-label">Razas Principales</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">100%</span>
      <span class="stat-label">Trazabilidad</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">3204+</span>
      <span class="stat-label">Días de Cuidado</span>
    </div>
    </div>
  </div>
</div>

<!-- Alimentación -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en alimentación -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.05; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 90px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Alimentación Balanceada</h2>
  <p>Nuestro programa de alimentación está diseñado para maximizar la eficiencia y calidad de la producción.</p>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">🌾</span>
      <h3>Forrajes Propios</h3>
      <p>Producción de alfalfa, sorgo y otros forrajes de alta calidad nutricional.</p>
    </div>
    <div class="card">
      <span class="card-icon">🌽</span>
      <h3>Granos de Calidad</h3>
      <p>Maíz y soja de nuestra propia producción para alimentación balanceada.</p>
    </div>
    <div class="card">
      <span class="card-icon">🧪</span>
      <h3>Suplementos</h3>
      <p>Minerales y vitaminas específicas para cada etapa del desarrollo animal.</p>
    </div>
  </div>
</section>

<script>
// Carga inteligente del video para mejor rendimiento
document.addEventListener('DOMContentLoaded', function() {
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
</script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
