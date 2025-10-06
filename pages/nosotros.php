<?php
require_once __DIR__ . '/../includes/config.php';

$title = "Nosotros - Albino Luis Zorzon";
$desc = "Conoce nuestra historia familiar de más de cinco décadas en la producción agropecuaria desde La Lola, Santa Fe.";
include __DIR__ . "/../partials/header.php";
?>

<!-- Hero Section -->
<div class="hero fade-in-up">
  <h1>Nuestra Historia</h1>
  <p>Más de cinco décadas de tradición familiar en la producción agropecuaria argentina</p>
</div>

<!-- Historia -->
<section class="fade-in-up">
  <h2>Nuestra Historia</h2>
  <p><strong>Albino Luis Zorzon e Hijos</strong> es una empresa familiar con más de cinco décadas de trayectoria en el sector agrícola y ganadero. Nuestros orígenes se remontan a <strong>La Lola, Santa Fe</strong>, donde a comienzos de la década del '70 <strong>Albino Luis Zorzon</strong> inició nuestras actividades con esfuerzo, compromiso y una fuerte unión familiar.</p>
  
  <p>Con el paso del tiempo, fuimos creciendo y expandiéndonos, siempre manteniendo la esencia que nos caracteriza: <strong>trabajo en familia, responsabilidad con la tierra y pasión por la producción agropecuaria</strong>.</p>
  
</section>

<!-- Valores -->
<section class="fade-in-up">
  <h2>Nuestros Valores</h2>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">🌍</span>
      <h3>Sostenibilidad</h3>
      <p>Prácticas agrícolas que respetan el medio ambiente y preservan los recursos naturales para las futuras generaciones.</p>
    </div>
    <div class="card">
      <span class="card-icon">🔬</span>
      <h3>Innovación</h3>
      <p>Adopción de nuevas tecnologías y técnicas que nos permiten ser más eficientes y competitivos en el mercado.</p>
    </div>
    <div class="card">
      <span class="card-icon">🤝</span>
      <h3>Compromiso</h3>
      <p>Compromiso con la calidad, la excelencia y el servicio a nuestros clientes y la comunidad.</p>
    </div>
  </div>
</section>

<!-- Video Institucional -->
<section class="fade-in-up">
  <h2>Conocé Nuestra Historia</h2>
  <div style="max-width: 800px; margin: 0 auto; text-align: center;">
    <div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; background: #000; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow);">
      <iframe 
        src="https://www.youtube.com/embed/9uru6TGV9GQ?rel=0&modestbranding=1&showinfo=0" 
        title="Historia de Albino Luis Zorzon e hijos"
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;">
      </iframe>
    </div>
    <p style="margin-top: 1rem; color: var(--text-dark); font-style: italic;">
      Descubrí más sobre nuestra trayectoria y valores familiares
    </p>
  </div>
</section>

<!-- Ubicación -->
<section class="fade-in-up">
  <h2>Nuestra Ubicación</h2>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">🌾</span>
      <h3>Clima Ideal</h3>
      <p>Clima templado húmedo con lluvias bien distribuidas, ideal para la producción de cereales y ganadería.</p>
    </div>
    <div class="card">
      <span class="card-icon">🚛</span>
      <h3>Acceso Logístico</h3>
      <p>Excelente conectividad con puertos y centros de comercialización para la exportación de nuestros productos.</p>
    </div>
    <div class="card">
      <span class="card-icon">🏘️</span>
      <h3>Comunidad Local</h3>
      <p>Integrados a la comunidad rural, contribuyendo al desarrollo económico y social de la región.</p>
    </div>
  </div>
</section>


<!-- Certificaciones -->
<section class="fade-in-up">
  <h2>Certificaciones y Compromisos</h2>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">✅</span>
      <h3>Buenas Prácticas Agrícolas</h3>
      <p>Implementamos las mejores prácticas agrícolas para garantizar la calidad y seguridad de nuestros productos.</p>
    </div>
    <div class="card">
      <span class="card-icon">🌱</span>
      <h3>Agricultura Sustentable</h3>
      <p>Comprometidos con prácticas que preservan el suelo y el medio ambiente para las futuras generaciones.</p>
    </div>
    <div class="card">
      <span class="card-icon">📋</span>
      <h3>Trazabilidad</h3>
      <p>Sistema completo de trazabilidad desde la producción hasta el consumidor final.</p>
    </div>
  </div>
</section>



<?php include __DIR__ . "/../partials/footer.php"; ?>
