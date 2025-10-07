<?php
require_once __DIR__ . '/../includes/config.php';

$title = "Agricultura - Albino Luis Zorzon";
$desc = "Producción de cereales, oleaginosas y forrajeras con tecnología de punta y prácticas sustentables.";
include __DIR__ . "/../partials/header.php";
?>

<!-- Hero Section -->
<div class="hero fade-in-up">
  <video autoplay muted loop playsinline>
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
<section class="fade-in-up">
  <h2>Nuestros Cultivos</h2>
  <div class="crops-grid-uniform">
    <div class="crop-card">
      <div class="crop-card-header">
        <span class="crop-icon">🌾</span>
        <h4>Trigo</h4>
      </div>
      <p>Producción de variedades adaptadas a la región con manejo integrado.</p>
      <ul class="crop-list">
        <li>Alto rendimiento</li>
        <li>Suelo sustentable</li>
        <li>Control de malezas</li>
      </ul>
    </div>

    <div class="crop-card">
      <div class="crop-card-header">
        <span class="crop-icon">🌽</span>
        <h4>Maíz</h4>
      </div>
      <p>Cultivo con tecnología de punta y fertilización precisa.</p>
      <ul class="crop-list">
        <li>Híbridos modernos</li>
        <li>Siembra directa</li>
        <li>Fertilización balanceada</li>
      </ul>
    </div>

    <div class="crop-card">
      <div class="crop-card-header">
        <span class="crop-icon">🌻</span>
        <h4>Girasol</h4>
      </div>
      <p>Producción para aceite y confitería con rotación de cultivos.</p>
      <ul class="crop-list">
        <li>Variedades oleaginosas</li>
        <li>Rotación sustentable</li>
        <li>Manejo integrado de plagas</li>
      </ul>
    </div>

    <div class="crop-card">
      <div class="crop-card-header">
        <span class="crop-icon">🌿</span>
        <h4>Soja</h4>
      </div>
      <p>Cultivo sustentable con semillas inoculadas y manejo biológico.</p>
      <ul class="crop-list">
        <li>Inoculación de semillas</li>
        <li>Control biológico</li>
        <li>Sustentabilidad</li>
      </ul>
    </div>

    <div class="crop-card">
      <div class="crop-card-header">
        <span class="crop-icon"></span>
        <h4>Algodón</h4>
      </div>
      <p>Producción de fibra larga y calidad premium con técnicas modernas.</p>
      <ul class="crop-list">
        <li>Fibra de calidad</li>
        <li>Manejo especializado</li>
        <li>Producción premium</li>
      </ul>
    </div>
  </div>
</section>

<!-- Tecnología -->
<section class="fade-in-up">
  <h2>Tecnología Agrícola</h2>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">🚜</span>
      <h3>Maquinaria Moderna</h3>
      <p>Equipos de última generación para siembra, cosecha y laboreo del suelo.</p>
    </div>
    <div class="card">
      <span class="card-icon">📊</span>
      <h3>Agricultura de Precisión</h3>
      <p>Uso de GPS, sensores y análisis de datos para optimizar cada metro cuadrado.</p>
    </div>
    <div class="card">
      <span class="card-icon">🌱</span>
      <h3>Siembra Directa</h3>
      <p>Práctica sustentable que preserva el suelo y reduce la erosión.</p>
    </div>
  </div>
</section>

<!-- Estadísticas Agrícolas -->
<div class="stats fade-in-up">
  <video autoplay muted loop playsinline style="transform: scale(1.3 );" playbackRate="1.3">
    <source src="../assets/videos/nuestros_numeros_agricolas.MP4" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    Tu navegador no soporta videos HTML5.
  </video>
  <div class="stats-content">
    <h2>Nuestros Números Agrícolas</h2>
    <div class="stats-grid">
    <div class="stat-item">
      <span class="stat-number">8000+</span>
      <span class="stat-label">Hectáreas Cultivadas</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">5</span>
      <span class="stat-label">Cultivos Principales</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">50%</span>
      <span class="stat-label">Siembra Directa</span>
    </div>
    <div class="stat-item">
      <span class="stat-number">50%</span>
      <span class="stat-label">Siembra Convencional</span>
    </div>
  </div>
  </div>
</div>

<!-- Sustentabilidad -->
<section class="fade-in-up">
  <h2>Compromiso Sustentable</h2>
  <p>En Albino Luis Zorzon, creemos en una agricultura que respete el medio ambiente y preserve los recursos para las futuras generaciones.</p>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">🌍</span>
      <h3>Conservación del Suelo</h3>
      <p>Prácticas que mantienen la fertilidad y estructura del suelo a largo plazo.</p>
    </div>
    <div class="card">
      <span class="card-icon">🦋</span>
      <h3>Biodiversidad</h3>
      <p>Rotación de cultivos y corredores biológicos para preservar la fauna local.</p>
    </div>
    <div class="card">
      <span class="card-icon">💚</span>
      <h3>Energía Renovable</h3>
      <p>Uso de energías limpias en nuestras operaciones agrícolas.</p>
    </div>
  </div>
</section>


<?php include __DIR__ . "/../partials/footer.php"; ?>
