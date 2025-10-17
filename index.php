<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/php/index-functions.php';

$title = "Albino Luis Zorzon — Agricultura y Ganadería";
$desc = "Empresa familiar con más de cinco décadas de experiencia en producción agropecuaria de alto rendimiento. Agricultura y ganadería desde La Lola, Santa Fe.";
include __DIR__ . "/partials/header.php";
?>

<link rel="stylesheet" href="assets/css/index.css?v=<?= time() ?>">

<!-- Hero Section -->
<div class="hero fade-in-up">
  <!-- Prioridad alta para video LCP -->
  <video 
    id="heroVideo"
    autoplay 
    muted 
    loop 
    playsinline 
    preload="auto" 
    fetchpriority="high"
    aria-hidden="true"
    tabindex="-1"
    style="width: 100%; height: 100%; object-fit: cover;">
    <source src="assets/videos/index__comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <img src="assets/images/logo_empresa_comp.webp" alt="Albino Luis Zorzon - Producción Agropecuaria" style="width: 100%; height: 100%; object-fit: cover;">
  </video>
  <div class="hero-content">
            <h1>Albino Luis Zorzon e hijos</h1>
    <p>Producción agropecuaria de alto rendimiento con más de cinco décadas de experiencia familiar</p>
    <a href="pages/agricultura.php" class="btn">Conocé más</a>
  </div>
</div>

<!-- Estadísticas -->
<div class="stats fade-in-up">
  <video autoplay muted loop playsinline preload="metadata" ">
    <source src="assets/videos/numeros_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); z-index: 1;"></div>
  </video>
  
  <!-- Overlay para mejorar contraste del texto -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(139,69,19,0.4) 0%, rgba(160,82,45,0.2) 50%, rgba(101,67,33,0.3) 100%); z-index: 1;"></div>
 
  <div style="position: relative; z-index: 2;">
     <?= generateIndexStatsHTML() ?>
  </div>

 </div>

<!-- Servicios -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en servicios -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.08; z-index: 1; pointer-events: none;">
    <img src="assets/images/logo_empresa_comp.webp" alt="Logo Albino Luis Zorzon e hijos - Marca de agua" style="width: 100px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestros Servicios</h2>
  <?= generateIndexServiciosHTML() ?>
</section>

<!-- Sobre Nosotros -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en historia -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="assets/images/logo_empresa_comp.webp" alt="Logo Albino Luis Zorzon e hijos - Marca de agua" style="width: 80px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestra Historia</h2>
  <p><strong>Albino Luis Zorzon e Hijos S.H.</strong> es una empresa familiar del Norte de Santa Fe con más de cinco décadas de trayectoria en el sector agrícola y ganadero. Nuestros orígenes se remontan a <strong>La Lola, Santa Fe</strong>, donde a comienzos de la década del '70 iniciamos nuestras actividades con esfuerzo, compromiso y una fuerte unión familiar.</p>
  <p>Con el paso del tiempo, fuimos creciendo y expandiéndonos, siempre manteniendo la esencia que nos caracteriza: <strong>trabajo en familia, responsabilidad con la tierra y pasión por la producción agropecuaria</strong>. Hoy, la empresa continúa con la misma visión que nos impulsó desde el inicio, integrando nuevas generaciones y adaptándonos a los desafíos actuales del campo argentino.</p>
  <div style="text-align: center; margin-top: 2rem;">
    <a href="pages/nosotros.php" class="btn btn-secondary">Conocé mas de nosotros</a>
  </div>
</section>

<!-- Compromiso -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en compromiso -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.05; z-index: 1; pointer-events: none;">
    <img src="assets/images/logo_empresa_comp.webp" alt="Logo Albino Luis Zorzon e hijos - Marca de agua" style="width: 90px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestro Compromiso</h2>
  <?= generateIndexCompromisosHTML() ?>
</section>

<script src="assets/js/index.js?v=<?= time() ?>"></script>

<?php include __DIR__ . "/partials/footer.php"; ?>
