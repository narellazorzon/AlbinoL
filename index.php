<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/php/index-functions.php';

$title = "Albino Luis Zorzon — Agricultura y Ganadería";
$desc = "Empresa familiar con más de cinco décadas de experiencia en producción agropecuaria de alto rendimiento. Agricultura y ganadería desde La Lola, Santa Fe.";
include __DIR__ . "/partials/header.php";
?>

<!-- =============================================== -->
<!-- OPTIMIZACIÓN MÓVIL - Recursos críticos Inicio -->
<!-- =============================================== -->

<!-- Preload de recursos críticos para FCP/LCP -->
<link rel="preload" href="assets/css/index.css?v=<?= time() ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="assets/videos/index1080_preview.mp4?v=<?= time() ?>" as="video" fetchpriority="high">
<link rel="preload" href="assets/images/logo_comp.png?v=<?= time() ?>" as="image" fetchpriority="high">

<!-- Fallback para navegadores sin JavaScript -->
<noscript><link rel="stylesheet" href="assets/css/index.css?v=<?= time() ?>"></noscript>

<!-- Hero Section -->
<div class="hero fade-in-up">
  <!-- Prioridad alta para LCP video -->
  <video autoplay muted loop playsinline preload="auto" fetchpriority="high" style="width: 100%; height: 100%; object-fit: cover;">
    <source src="assets/videos/index1080_preview.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <img src="assets/images/logo_comp.png?v=<?= time() ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;" fetchpriority="high" width="1920" height="1080">
  </video>
  <div class="hero-content">
            <h1>Albino Luis Zorzon e hijos</h1>
    <p>Producción agropecuaria de alto rendimiento con más de cinco décadas de experiencia familiar</p>
    <a href="pages/agricultura.php" class="btn">Conocé más</a>
  </div>
</div>

<!-- Estadísticas -->
<div class="stats fade-in-up">
  <video autoplay muted loop playsinline preload="none" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; opacity: 0.6;">
    <source src="assets/videos/numeros.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); z-index: 1;"></div>
  </video>
  
  <!-- Overlay eliminado para mostrar colores originales del video -->
  
  <div class="stats-content" style="position: relative; z-index: 2;">
    <?= generateIndexStatsHTML() ?>
  </div>
</div>

<!-- Servicios -->
<section class="fade-in-up">
  <h2>Nuestros Servicios</h2>
  <?= generateIndexServiciosHTML() ?>
</section>

<!-- Sobre Nosotros -->
<section class="fade-in-up">
  <h2>Nuestra Historia</h2>
  <p><strong>Albino Luis Zorzon e Hijos S.H.</strong> es una empresa familiar del Norte de Santa Fe con más de cinco décadas de trayectoria en el sector agrícola y ganadero. Nuestros orígenes se remontan a <strong>La Lola, Santa Fe</strong>, donde a comienzos de la década del '70 iniciamos nuestras actividades con esfuerzo, compromiso y una fuerte unión familiar.</p>
  <p>Con el paso del tiempo, fuimos creciendo y expandiéndonos, siempre manteniendo la esencia que nos caracteriza: <strong>trabajo en familia, responsabilidad con la tierra y pasión por la producción agropecuaria</strong>. Hoy, la empresa continúa con la misma visión que nos impulsó desde el inicio, integrando nuevas generaciones y adaptándonos a los desafíos actuales del campo argentino.</p>
  <div style="text-align: center; margin-top: 2rem;">
    <a href="pages/nosotros.php" class="btn btn-secondary">Conocé mas de nosotros</a>
  </div>
</section>

<!-- Compromiso -->
<section class="fade-in-up">
  <h2>Nuestro Compromiso</h2>
  <?= generateIndexCompromisosHTML() ?>
</section>

<!-- Script optimizado con defer para mejor rendimiento -->
<script src="assets/js/index.js?v=<?= time() ?>" defer></script>

<?php include __DIR__ . "/partials/footer.php"; ?>
