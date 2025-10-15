<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../php/agricultura-functions.php';

$title = "Agricultura - Albino Luis Zorzon";
$desc = "Producción sustentable de cereales y oleaginosas integrando toda la cadena agrícola con tecnología, maquinaria propia y sustentabilidad.";
include __DIR__ . "/../partials/header.php";
?>

<link rel="stylesheet" href="../assets/css/agricultura.css?v=<?= time() ?>">

<!-- Hero Section -->
<div class="hero fade-in-up">
  <video id="heroVideo" autoplay muted loop playsinline preload="metadata" poster="../assets/images/logo_albino_comprimido.webp" fetchpriority="high">
    <source src="../assets/videos/videos_agronomia_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <img src="../assets/images/logo_albino_comprimido.webp" alt="Agricultura Albino Luis Zorzon" style="width: 100%; height: 100%; object-fit: cover;" fetchpriority="high">
  </video>
  <div class="hero-content">
    <h1>Agricultura</h1>
    <p>Producción sustentable de cereales y oleaginosas integrando toda la cadena agrícola con tecnología, maquinaria propia y sustentabilidad.</p>
  </div>
</div>

<!-- Servicios Agrícolas -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en cultivos -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.08; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 100px; height: auto; filter: grayscale(100%);" loading="lazy">
  </div>
  <h2>Nuestros Cultivos</h2>
  <?= generateCultivosHTML() ?>
</section>

<!-- Tecnología -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en tecnología -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 80px; height: auto; filter: grayscale(100%);" loading="lazy">
  </div>
  <h2>Tecnología Agrícola</h2>
  <?= generateTecnologiaHTML() ?>
</section>

<!-- Estadísticas Agrícolas -->
<div class="stats fade-in-up">
  <video autoplay muted loop playsinline preload="none">
    <source src="../assets/videos/nuestros_numeros_agricolas_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    Tu navegador no soporta videos HTML5.
  </video>
  
  <!-- Overlay para mejorar contraste del texto -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.2) 100%); z-index: 1;"></div>
  
  <div style="position: relative; z-index: 2;">
    <h2>Nuestros Números Agrícolas</h2>
    <?= generateAgriculturaStatsHTML() ?>
  </div>
</div>

<!-- Sustentabilidad y Compromiso Ambiental -->
<section class="sustentabilidad-section">
  <!-- Header con video de fondo -->
  <header class="sustentabilidad-header">
    <video autoplay muted loop playsinline preload="metadata" class="sustentabilidad-video">
      <source src="../assets/videos/video_header.mp4?v=<?= time() ?>" type="video/mp4">
      <!-- Fallback para navegadores que no soportan video -->
      <div class="sustentabilidad-fallback"></div>
    </video>
    <div class="sustentabilidad-overlay"></div>
    <div class="sustentabilidad-content">
      <h2 class="sustentabilidad-title">🌿 Sustentabilidad y Compromiso Ambiental</h2>
      <p class="sustentabilidad-subtitle">Trabajamos con la convicción de que producir alimentos de calidad implica cuidar los recursos naturales y el equilibrio del suelo</p>
    </div>
  </header>

  <!-- Cards de sustentabilidad -->
  <div class="sustentabilidad-cards">
    <article class="sustentabilidad-card fade-in-up">
      <div class="card-icon">📊</div>
      <h3>Medición de Huella de Carbono</h3>
      <p>Realizamos la medición de huella de carbono en nuestros principales cultivos —soja, maíz y algodón— para conocer las emisiones generadas y el carbono capturado en el suelo, optimizando así el uso de insumos y la eficiencia productiva.</p>
    </article>

    <article class="sustentabilidad-card fade-in-up">
      <div class="card-icon">🌾</div>
      <h3>Trazabilidad y Programas de Sustentabilidad</h3>
      <p>Implementamos trazabilidad digital con UCrop.it y participamos del programa ProCarbono de Bayer, garantizando transparencia, innovación y compromiso ambiental en cada lote.</p>
    </article>

    <article class="sustentabilidad-card fade-in-up">
      <div class="card-icon">🧪</div>
      <h3>Manejo Responsable de Agroquímicos</h3>
      <p>Evaluamos el Índice de Impacto Ambiental de los Agroquímicos (EIQ) para seleccionar los productos más seguros, reduciendo riesgos sobre el ambiente, los trabajadores y la comunidad.</p>
    </article>

    <article class="sustentabilidad-card fade-in-up">
      <div class="card-icon">♻️</div>
      <h3>Enmiendas Orgánicas y Mejora del Suelo</h3>
      <p>Incorporamos cama de pollo, digestato y digesto provenientes de plantas de biogás y etanol, aportando carbono y nutrientes naturales que mejoran la estructura, fertilidad y balance del suelo.</p>
    </article>
  </div>

  <!-- Bloque destacado del propósito -->
  <footer class="sustentabilidad-highlight">
    <div class="highlight-content">
      <div class="highlight-icon">💚</div>
      <h3>Nuestro Propósito</h3>
      <p>Generar alimentos de calidad, proteger la salud del suelo e integrar innovación tecnológica y respeto por la tierra que nos vio crecer.</p>
    </div>
  </footer>
</section>

<!-- Script diferido para mejorar LCP -->
<script src="../assets/js/agricultura.js?v=<?= time() ?>" defer></script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
