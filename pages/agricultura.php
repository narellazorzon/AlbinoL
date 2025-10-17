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
  <video id="heroVideo" autoplay muted loop playsinline preload="none" poster="../assets/images/back_videos.webp">
    <source src="../assets/videos/video_agro_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    <img src="../assets/images/logo_empresa_comp.webp" alt="Agricultura Albino Luis Zorzon - Producción Sustentable" style="width: 100%; height: 100%; object-fit: cover;">
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
    <img src="../assets/images/logo_empresa_comp.webp" alt="" style="width: 100px; height: auto; filter: grayscale(100%);" loading="lazy">
  </div>
  <h2>Nuestros Cultivos</h2>
  <?= generateCultivosHTML() ?>
</section>

<!-- Tecnología -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en tecnología -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_empresa_comp.webp" alt="" style="width: 80px; height: auto; filter: grayscale(100%);" loading="lazy">
  </div>
  <h2>Tecnología Agrícola</h2>
  <?= generateTecnologiaHTML() ?>
</section>

<!-- Estadísticas Agrícolas -->
<div class="stats fade-in-up">
  <video autoplay muted loop playsinline preload="none">
    <source src="../assets/videos/numeros_agricolas_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
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
      <source src="../assets/videos/sustentabilidad_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
      <!-- Fallback para navegadores que no soportan video -->
      <div class="sustentabilidad-fallback"></div>
    </video>
    <div class="sustentabilidad-overlay"></div>
    <div class="sustentabilidad-content">
      <h2 class="sustentabilidad-title">Sustentabilidad y Compromiso Ambiental</h2>
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

</section>

<!-- Cumplimiento Normativo – Provincia de Santa Fe -->
<section class="normativa-section fade-in-up">
  <div class="normativa-header">
    <video autoplay muted loop playsinline preload="metadata" class="normativa-video">
      <source src="../assets/videos/normativo_provincial_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
      <!-- Fallback para navegadores que no soportan video -->
      <div class="normativa-fallback"></div>
    </video>
    <div class="normativa-overlay"></div>
    <div class="normativa-content">
      <h2 class="normativa-title">Cumplimiento Normativo – Provincia de Santa Fe</h2>
      <p class="normativa-subtitle">Todas nuestras labores de pulverización se realizan bajo los lineamientos de la Ley Provincial 11.273 y su Decreto Reglamentario 552/97</p>
    </div>
  </div>

  <div class="normativa-cards">
    <article class="normativa-card fade-in-up">
      <div class="card-icon">✅</div>
      <h3>Equipos Habilitados</h3>
      <p>Utilizamos únicamente pulverizadoras registradas y aprobadas por el Ministerio de Producción, Ciencia y Tecnología de la provincia.</p>
    </article>

    <article class="normativa-card fade-in-up">
      <div class="card-icon">👩‍🌾</div>
      <h3>Aplicaciones Seguras</h3>
      <p>Las tareas son supervisadas por ingenieros agrónomos matriculados, con recetas fitosanitarias que garantizan el cumplimiento técnico y legal.</p>
    </article>

    <article class="normativa-card fade-in-up">
      <div class="card-icon">🌎</div>
      <h3>Responsabilidad Ambiental</h3>
      <p>Trabajamos con precisión y control para minimizar la deriva, proteger el suelo y cuidar la biodiversidad.</p>
    </article>
  </div>

  <div class="normativa-links">
    <a href="https://www.santafe.gov.ar/index.php/web/content/download/3686/21012/" target="_blank" rel="noopener noreferrer" class="normativa-link">
      🔗 Ley 11.273 de Productos Fitosanitarios (Santa Fe)
    </a>
    <a href="https://www.ecofield.net/Legales/SantaFe/dec552-97.htm" target="_blank" rel="noopener noreferrer" class="normativa-link">
      🔗 Decreto Reglamentario 552/97
    </a>
  </div>
</section>

<!-- Cadena Completa de Transporte -->
<section class="transporte-section fade-in-up">
  <div class="transporte-container">
    <div class="transporte-content">
      <h2>Cadena Completa de Transporte propio</h2>
      <p>Contamos con nuestra propia flota de camiones, lo que nos permite mantener una <strong>cadena productiva completa</strong> desde la siembra hasta la entrega final. Esta integración nos garantiza:</p>
      
      <div class="transporte-beneficios">
        <div class="beneficio-item">
          <span class="beneficio-icon">⚡</span>
          <h3>Eficiencia Logística</h3>
          <p>Control total de tiempos y rutas de entrega</p>
        </div>
        
        <div class="beneficio-item">
          <span class="beneficio-icon">🛡️</span>
          <h3>Calidad Garantizada</h3>
          <p>Cuidado especializado de nuestros productos durante el transporte</p>
        </div>
      </div>
    </div>
    
    <div class="transporte-video-container">
      <video autoplay muted loop playsinline preload="metadata" class="transporte-video">
        <source src="../assets/videos/camion_comprimido.mp4?v=<?= time() ?>" type="video/mp4">
        <!-- Fallback para navegadores que no soportan video -->
        <div class="transporte-video-fallback">
          <div class="fallback-content">
            <span class="fallback-icon">🚛</span>
            <p>Nuestra flota de camiones</p>
          </div>
        </div>
      </video>
      
      <!-- Overlay verde para tono verde -->
      <div class="transporte-video-overlay"></div>
    </div>
  </div>
</section>

<script src="../assets/js/agricultura.js?v=<?= time() ?>"></script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
