<?php
require_once __DIR__ . '/includes/config.php';

$title = "Página no encontrada - Albino Luis Zorzon";
$desc = "La página que buscas no existe. Regresa al inicio de nuestro sitio web.";
include __DIR__ . "/partials/header.php";
?>

<div class="hero fade-in-up" style="text-align: center; padding: 4rem 2rem;">
  <h1>404 - Página no encontrada</h1>
  <p>Lo sentimos, la página que buscas no existe o ha sido movida.</p>
  <div style="margin-top: 2rem;">
    <a href="index.php" class="btn">Volver al inicio</a>
    <a href="contacto.php" class="btn btn-secondary" style="margin-left: 1rem;">Contactanos</a>
  </div>
</div>

<section class="fade-in-up">
  <h2>¿Qué puedes hacer?</h2>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">🏠</span>
      <h3>Ir al inicio</h3>
      <p>Regresa a nuestra página principal para explorar nuestros servicios.</p>
      <a href="index.php" class="btn">Ir al inicio</a>
    </div>
    <div class="card">
      <span class="card-icon">📞</span>
      <h3>Contactarnos</h3>
      <p>Si necesitas ayuda, no dudes en contactarnos directamente.</p>
      <a href="contacto.php" class="btn">Contactar</a>
    </div>
    <div class="card">
      <span class="card-icon">🌾</span>
      <h3>Nuestros servicios</h3>
      <p>Explora nuestros servicios de agricultura, ganadería y más.</p>
      <a href="agricultura.php" class="btn">Ver servicios</a>
    </div>
  </div>
</section>

<?php include __DIR__ . "/partials/footer.php"; ?>
