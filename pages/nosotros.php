<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../php/nosotros-functions.php';

$title = "Nosotros - Albino Luis Zorzon";
$desc = "Conoce nuestra historia familiar de más de cinco décadas en la producción agropecuaria desde La Lola, Santa Fe.";
include __DIR__ . "/../partials/header.php";
?>

<!-- CSS específico para la página Nosotros -->
<link rel="stylesheet" href="../assets/css/nosotros.css?v=<?= time() ?>">

<!-- Hero Section -->
<div class="hero fade-in-up">
  <video autoplay muted loop playsinline preload="metadata" poster="../assets/images/logo_comp.png">
    <source src="../assets/videos/nosotros.mp4" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    Tu navegador no soporta videos HTML5.
  </video>
  <div class="hero-content">
    <h1>Nuestra Historia</h1>
    <p>Más de cinco décadas de tradición familiar en la producción agropecuaria argentina</p>
  </div>
</div>

<!-- Historia -->
<section class="fade-in-up" style="position: relative;">
  <h2>Nuestra Historia</h2>
  <p><strong>Albino Luis Zorzon e Hijos</strong> es una empresa familiar con más de cinco décadas de trayectoria en el sector agrícola y ganadero. Nuestros orígenes se remontan a <strong>La Lola, Santa Fe</strong>, donde a comienzos de la década del '70 <strong>Albino Luis Zorzon</strong> inició nuestras actividades con esfuerzo, compromiso y una fuerte unión familiar.</p>
  
  <p>Con el paso del tiempo, fuimos creciendo y expandiéndonos, siempre manteniendo la esencia que nos caracteriza: <strong>trabajo en familia, responsabilidad con la tierra y pasión por la producción agropecuaria</strong>.</p>
  
  <!-- Logo como marca de agua -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.1; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 120px; height: auto; filter: grayscale(100%);">
  </div>
  
  <!-- Galería de imágenes históricas -->
  <?= generateGalleryHTML() ?>

  <!-- Modal para ver imágenes en tamaño completo -->
  <div id="imageModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); overflow-y: auto; overflow-x: hidden;">
    <div class="modal-container" style="position: relative; width: 100%; min-height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px 20px 20px; box-sizing: border-box;">
      <span class="modal-close" onclick="closeModal()" style="position: fixed; top: 20px; right: 35px; color: #fff; font-size: 40px; font-weight: bold; cursor: pointer; z-index: 1001; background: rgba(0,0,0,0.5); border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">&times;</span>
      <img id="modalImage" class="modal-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Imagen ampliada" style="max-width: 90%; max-height: 80vh; object-fit: contain; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.5); margin: 20px 0; display: block;">
      <div id="modalCaption" class="modal-caption" style="position: relative; color: #fff; text-align: center; background: rgba(0,0,0,0.7); padding: 10px 20px; border-radius: 5px; font-size: 16px; margin-top: 20px; max-width: 80%; margin-left: auto; margin-right: auto;"></div>
      
      <!-- Logo en el modal -->
      <div class="modal-logo" style="position: fixed; bottom: 20px; left: 20px; z-index: 1001; opacity: 0.7;">
        <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 80px; height: auto; filter: brightness(0) invert(1);">
      </div>
    </div>
  </div>

<!-- JavaScript específico para la página Nosotros -->
<script src="../assets/js/nosotros.js?v=<?= time() ?>"></script>
</section>

<!-- Valores -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en valores -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.08; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 100px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestros Valores</h2>
  <?= generateValuesHTML() ?>
  
  <!-- Logo en la sección de valores -->
  <div style="text-align: center; margin-top: 2rem; padding: 1rem; background: rgba(var(--primary-color-rgb), 0.05); border-radius: 10px;">
    <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 100px; height: auto; opacity: 0.8;">
    <p style="margin-top: 0.5rem; color: rgb(77, 57, 25); font-size: 14px; font-style: italic;">Más de cinco décadas de tradición familiar</p>
  </div>
</section>

<!-- Video Institucional -->
<section class="fade-in-up">
  <h2>Conocé más sobre nosotros</h2>
  <div style="max-width: 800px; margin: 0 auto; text-align: center;">
    <div class="video-wrapper" onclick="loadVideo(this)" style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; background: #000; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow); cursor: pointer;">
      <img src="../assets/images/youtube-thumbnail.jpg" alt="Video institucional" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
      <button class="play-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0,0,0,0.8); border: none; border-radius: 50%; width: 80px; height: 80px; color: white; font-size: 24px; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center;">▶️</button>
    </div>
    <p style="margin-top: 1rem; color: var(--text-dark); font-style: italic;">
      Ingeniero Agronomo Cristian Zorzon, parte de la familia fundadora y de la empresa
    </p>
  </div>
</section>

<!-- Ubicación -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en ubicación -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 80px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Nuestra Ubicación</h2>
  
  <!-- Dirección específica -->
  <div style="text-align: center; margin-bottom: 2rem; padding: 1.5rem; background: rgba(var(--primary-color-rgb), 0.05); border-radius: 10px; border-left: 4px solid var(--primary-color);">
    <div style="color: var(--primary-color); margin-bottom: 0.5rem; font-size: 1.3rem; font-weight: 600;">📍 Ubicación</div>
    <p style="font-size: 1.1rem; color: var(--text-dark); margin: 0; font-weight: 500;">
      Zona Rural La Lola RP 1 km 306<br>
      <span style="color: var(--text-light); font-size: 1rem;">Provincia de Santa Fe, Argentina</span>
    </p>
  </div>
  
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
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en certificaciones -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.05; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo_albino_comprimido.webp" alt="" style="width: 90px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Certificaciones y Compromisos</h2>
  <div class="cards-grid">
    <div class="card">
      <span class="card-icon">✅</span>
      <h3>Buenas Prácticas Agrícolas</h3>
      <p>Implementamos las mejores prácticas agrícolas para garantizar la calidad y seguridad de nuestros productos.</p>
    </div>
    <div class="card">
      <span class="card-icon">📋</span>
      <h3>Trazabilidad</h3>
      <p>Sistema completo de trazabilidad desde la producción hasta el consumidor final.</p>
    </div>
  </div>
  </section>

<script>
function loadVideo(el) {
  // Obtener el título del video desde el párrafo descriptivo
  const videoTitle = "Ingeniero Agronomo Cristian Zorzon, parte de la familia fundadora y de la empresa";
  
  el.innerHTML = '<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/9uru6TGV9GQ?autoplay=1&rel=0&modestbranding=1&showinfo=0&cc_load_policy=1&iv_load_policy=3&fs=1&disablekb=1&modestbranding=1&playsinline=1&enablejsapi=0" title="' + videoTitle + '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; border-width: 0;"></iframe>';
}
</script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
