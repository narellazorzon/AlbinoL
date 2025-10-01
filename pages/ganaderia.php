<?php
require_once __DIR__ . '/../includes/config.php';

$title = "Ganadería - Albino Luis Zorzon";
$desc = "Cría y engorde de ganado bovino con manejo integral y alimentación balanceada.";
include __DIR__ . "/../partials/header.php";
?>

<!-- Hero Section -->
<div class="hero fade-in-up">
  <h1>Ganadería</h1>
  <p>Cría y engorde de ganado bovino con manejo integral y alimentación balanceada</p>
</div>

<!-- Servicios Ganaderos -->
<section class="fade-in-up">
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
    <div class="card">
      <span class="card-icon">🏥</span>
      <h3>Sanidad Animal</h3>
      <p>Programa integral de salud animal con vacunaciones y controles veterinarios.</p>
      <ul style="text-align: left; margin-top: 1rem;">
        <li>Vacunaciones programadas</li>
        <li>Control veterinario</li>
        <li>Prevención de enfermedades</li>
      </ul>
    </div>
  </div>
</section>

<!-- Razas -->
<section class="fade-in-up">
  <h2>Razas que Trabajamos</h2>
  <div class="cards-grid">
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
    <div class="card">
      <span class="card-icon">🐃</span>
      <h3>Brangus</h3>
      <p>Híbrido entre Angus y Brahman, combina calidad de carne con resistencia al calor.</p>
    </div>
  </div>
</section>

<!-- Estadísticas Ganaderas -->
<div class="stats fade-in-up">
  <h2>Nuestros Números Ganaderos</h2>
  <div class="stats-grid">
    <div class="stat-item">
      <span class="stat-number">800+</span>
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
      <span class="stat-number">365</span>
      <span class="stat-label">Días de Cuidado</span>
    </div>
  </div>
</div>

<!-- Alimentación -->
<section class="fade-in-up">
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



<?php include __DIR__ . "/../partials/footer.php"; ?>
