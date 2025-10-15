<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../php/ganaderia-functions.php';

$title = "Ganadería - Albino Luis Zorzon";
$desc = "Cría y engorde de ganado bovino con manejo integral y alimentación balanceada.";
include __DIR__ . "/../partials/header.php";
?>

<!-- =============================================== -->
<!-- OPTIMIZACIÓN MÓVIL - Recursos críticos Ganadería -->
<!-- =============================================== -->

<!-- Preload de recursos críticos para FCP/LCP -->
<link rel="preload" href="../assets/css/ganaderia.css?v=<?= time() ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="../assets/videos/recopilacion_ganaderia_comprimido.mp4?v=<?= time() ?>" as="video" fetchpriority="high">
<link rel="preload" href="../assets/images/logo_comp.png?v=<?= time() ?>" as="image" fetchpriority="high">

<!-- Fallback para navegadores sin JavaScript -->
<noscript><link rel="stylesheet" href="../assets/css/ganaderia.css?v=<?= time() ?>"></noscript>

<!-- Hero Section -->
<div class="hero fade-in-up">
  <!-- Prioridad alta para LCP video -->
  <video id="heroVideo" autoplay muted loop playsinline preload="auto" fetchpriority="high" poster="../assets/images/logo_comp.png?v=<?= time() ?>" style="width: 100%; height: 100%; object-fit: cover;">
    <source src="../assets/videos/recopilacion_ganaderia_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <img src="../assets/images/logo_comp.png?v=<?= time() ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;" fetchpriority="high" width="1920" height="1080">
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
    <img src="../assets/images/logo_comp.png?v=<?= time() ?>" alt="" style="width: 100px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestras Actividades Ganaderas</h2>
  <?= generateActivitiesHTML() ?>
</section>

<!-- Razas -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en razas -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_comp.png?v=<?= time() ?>" alt="" style="width: 80px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Razas que Trabajamos</h2>
  <?= generateRazasHTML() ?>
</section>

<!-- Estadísticas Ganaderas -->
<div class="stats fade-in-up" style="position: relative; overflow: hidden;">
  <!-- Video de fondo para números ganaderos -->
  <video autoplay muted loop playsinline preload="none" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; opacity: 0.6;">
    <source src="../assets/videos/numeros_ganaderos_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); z-index: 1;"></div>
  </video>
  
  <!-- Overlay eliminado para mostrar colores originales del video -->
  
  <!-- Contenido sobre el video -->
  <div style="position: relative; z-index: 2;">
    <h2>Nuestros Números Ganaderos</h2>
    <?= generateStatsHTML() ?>
  </div>
</div>

<!-- Alimentación -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en alimentación -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.05; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_comp.png?v=<?= time() ?>" alt="" style="width: 90px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Alimentación Balanceada</h2>
  <p>Nuestro programa de alimentación está diseñado para maximizar la eficiencia y calidad de la producción.</p>
  <?= generateAlimentacionHTML() ?>
</section>

<!-- Script optimizado con defer para mejor rendimiento -->
<script src="../assets/js/ganaderia.js?v=<?= time() ?>" defer></script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
