<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../php/ganaderia-functions.php';

$title = "Ganadería - Albino Luis Zorzon";
$desc = "Cría y engorde de ganado bovino con manejo integral y alimentación balanceada.";
include __DIR__ . "/../partials/header.php";
?>

<link rel="stylesheet" href="../assets/css/ganaderia.css?v=<?= time() ?>">

<!-- Hero Section -->
<div class="hero fade-in-up">
  <video id="heroVideo" autoplay muted loop playsinline preload="metadata" poster="../assets/images/logo_comp.png" style="width: 100%; height: 100%; object-fit: cover;">
    <source src="../assets/videos/recopilacion_ganaderia_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <img src="../assets/images/logo_comp.png" alt="" style="width: 100%; height: 100%; object-fit: cover;">
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
    <img src="../assets/images/logo_comp.png" alt="" style="width: 100px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestras Actividades Ganaderas</h2>
  <?= generateActivitiesHTML() ?>
</section>

<!-- Razas -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en razas -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_comp.png" alt="" style="width: 80px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Razas que Trabajamos</h2>
  <?= generateRazasHTML() ?>
</section>

<!-- Estadísticas Ganaderas -->
<div class="stats fade-in-up" style="position: relative; overflow: hidden;">
  <!-- Video de fondo para números ganaderos -->
  <video autoplay muted loop playsinline preload="metadata" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; opacity: 0.6;">
    <source src="../assets/videos/numeros_ganaderos_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); z-index: 1;"></div>
  </video>
  
  <!-- Overlay para mejorar contraste del texto -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(20deg, rgba(139,69,19,0.4) 0%, rgba(160,82,45,0.2) 20%, rgba(101,67,33,0.3) 90%); z-index: 1;"></div>
  
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
    <img src="../assets/images/logo_comp.png" alt="" style="width: 90px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Alimentación Balanceada</h2>
  <p>Nuestro programa de alimentación está diseñado para maximizar la eficiencia y calidad de la producción.</p>
  <?= generateAlimentacionHTML() ?>
</section>

<script src="../assets/js/ganaderia.js?v=<?= time() ?>"></script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
