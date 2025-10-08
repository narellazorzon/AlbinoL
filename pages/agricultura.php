<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../php/agricultura-functions.php';

$title = "Agricultura - Albino Luis Zorzon";
$desc = "Producción de cereales, oleaginosas y forrajeras con tecnología de punta y prácticas sustentables.";
include __DIR__ . "/../partials/header.php";
?>

<link rel="stylesheet" href="../assets/css/agricultura.css">

<!-- Hero Section -->
<div class="hero fade-in-up">
  <video id="heroVideo" autoplay muted loop playsinline preload="none" poster="../assets/images/logo.png">
    <source src="../assets/videos/videos_agronomia.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    Tu navegador no soporta videos HTML5.
  </video>
  <div class="hero-content">
    <h1>Agricultura</h1>
    <p>Producción de cereales, oleaginosas y forrajeras con tecnología de punta y prácticas sustentables</p>
  </div>
</div>

<!-- Servicios Agrícolas -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en cultivos -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.08; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 100px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestros Cultivos</h2>
  <?= generateCultivosHTML() ?>
</section>

<!-- Tecnología -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en tecnología -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 80px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Tecnología Agrícola</h2>
  <?= generateTecnologiaHTML() ?>
</section>

<!-- Estadísticas Agrícolas -->
<div class="stats fade-in-up">
  <video autoplay muted loop playsinline preload="none">
    <source src="../assets/videos/nuestros_numeros_agricolas.MP4" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    Tu navegador no soporta videos HTML5.
  </video>
  
  <!-- Overlay para mejorar contraste del texto -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.2) 100%); z-index: 1.5;"></div>
  
  <div style="position: relative; z-index: 2;">
    <h2>Nuestros Números Agrícolas</h2>
    <?= generateAgriculturaStatsHTML() ?>
  </div>
</div>

<!-- Sustentabilidad -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en sustentabilidad -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.05; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 90px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Compromiso Sustentable</h2>
  <p>En Albino Luis Zorzon, creemos en una agricultura que respete el medio ambiente y preserve los recursos para las futuras generaciones.</p>
  <?= generateSustentabilidadHTML() ?>
</section>

<script src="../assets/js/agricultura.js"></script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
