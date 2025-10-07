<?php
require_once __DIR__ . '/../includes/config.php';

$title = "Nosotros - Albino Luis Zorzon";
$desc = "Conoce nuestra historia familiar de más de cinco décadas en la producción agropecuaria desde La Lola, Santa Fe.";
include __DIR__ . "/../partials/header.php";
?>

<!-- Hero Section -->
<div class="hero fade-in-up">
  <video autoplay muted loop playsinline>
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
<section class="fade-in-up">
  <h2>Nuestra Historia</h2>
  <p><strong>Albino Luis Zorzon e Hijos</strong> es una empresa familiar con más de cinco décadas de trayectoria en el sector agrícola y ganadero. Nuestros orígenes se remontan a <strong>La Lola, Santa Fe</strong>, donde a comienzos de la década del '70 <strong>Albino Luis Zorzon</strong> inició nuestras actividades con esfuerzo, compromiso y una fuerte unión familiar.</p>
  
  <p>Con el paso del tiempo, fuimos creciendo y expandiéndonos, siempre manteniendo la esencia que nos caracteriza: <strong>trabajo en familia, responsabilidad con la tierra y pasión por la producción agropecuaria</strong>.</p>
  
  <!-- Galería de imágenes históricas -->
  <div class="gallery-container" style="margin: 2rem 0; position: relative;">
    <div class="gallery-wrapper" style="overflow-x: auto; overflow-y: hidden; scroll-behavior: smooth; padding: 15px 0; scrollbar-width: thin; scrollbar-color: var(--primary-color) transparent;">
      <div class="gallery-track" style="display: flex; gap: 1.5rem; padding: 0 2rem; min-width: max-content; align-items: center;">
        <div class="gallery-item" onclick="openModal('../assets/images/imagenes_albino_page-0002.jpg', 'Historia familiar Albino Luis Zorzon')" style="cursor: pointer; flex-shrink: 0; width: 280px; height: 200px; position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;">
          <img src="../assets/images/imagenes_albino_page-0002.jpg" alt="Historia familiar Albino Luis Zorzon" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          <div class="gallery-label" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 15px; font-size: 14px; font-weight: 500; opacity: 0; transform: translateY(100%); transition: all 0.3s ease;">Campo La Lola, Santa Fe</div>
        </div>
        <div class="gallery-item" onclick="openModal('../assets/images/imagenes_albino_page-0004.jpg', 'Tabaco y producción agropecuaria')" style="cursor: pointer; flex-shrink: 0; width: 280px; height: 200px; position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;">
          <img src="../assets/images/imagenes_albino_page-0004.jpg" alt="Cosecha de tabaco y producción agropecuaria" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          <div class="gallery-label" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 15px; font-size: 14px; font-weight: 500; opacity: 0; transform: translateY(100%); transition: all 0.3s ease;">Cosecha de tabaco</div>
        </div>
        <div class="gallery-item" onclick="openModal('../assets/images/imagenes_albino_page-0008.jpg', 'Producción agropecuaria familiar')" style="cursor: pointer; flex-shrink: 0; width: 280px; height: 200px; position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;">
          <img src="../assets/images/imagenes_albino_page-0008.jpg" alt="Producción agropecuaria familiar" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          <div class="gallery-label" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 15px; font-size: 14px; font-weight: 500; opacity: 0; transform: translateY(100%); transition: all 0.3s ease;">Campo familiar</div>
        </div>
        <div class="gallery-item" onclick="openModal('../assets/images/imagenes_albino_page-0009.jpg', 'Tradición en el campo')" style="cursor: pointer; flex-shrink: 0; width: 280px; height: 200px; position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;">
          <img src="../assets/images/imagenes_albino_page-0009.jpg" alt="Tradición en el campo" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          <div class="gallery-label" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 15px; font-size: 14px; font-weight: 500; opacity: 0; transform: translateY(100%); transition: all 0.3s ease;">Tradición y modernidad</div>
        </div>
        <div class="gallery-item" onclick="openModal('../assets/images/imagenes_albino_page-0010.jpg', 'Compromiso con la tierra y la familia')" style="cursor: pointer; flex-shrink: 0; width: 280px; height: 200px; position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;">
          <img src="../assets/images/imagenes_albino_page-0010.jpg" alt="Compromiso con la tierra y la familia" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
          <div class="gallery-label" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 15px; font-size: 14px; font-weight: 500; opacity: 0; transform: translateY(100%); transition: all 0.3s ease;">Compromiso familiar</div>
        </div>
      </div>
    </div>
    
    <!-- Indicadores de scroll mejorados -->
    <div style="text-align: center; margin-top: 1.5rem; color: var(--text-light); font-size: 14px;">
      <span style="background: var(--primary-color); color: white; padding: 8px 16px; border-radius: 20px; font-weight: 500;">← Desliza para ver más imágenes →</span>
    </div>
  </div>

  <!-- Modal para ver imágenes en tamaño completo -->
  <div id="imageModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); overflow-y: auto; overflow-x: hidden;">
    <div style="position: relative; width: 100%; min-height: 100%; display: flex; align-items: center; justify-content: center; padding: 60px 20px 20px 20px; box-sizing: border-box;">
      <span onclick="closeModal()" style="position: fixed; top: 20px; right: 35px; color: #fff; font-size: 40px; font-weight: bold; cursor: pointer; z-index: 1001; background: rgba(0,0,0,0.5); border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">&times;</span>
      <img id="modalImage" style="max-width: 100%; max-height: none; object-fit: contain; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.5); margin: 20px 0;">
      <div id="modalCaption" style="position: relative; color: #fff; text-align: center; background: rgba(0,0,0,0.7); padding: 10px 20px; border-radius: 5px; font-size: 16px; margin-top: 20px; max-width: 80%; margin-left: auto; margin-right: auto;"></div>
    </div>
  </div>

  <style>
    /* Estilos para la galería mejorada */
    .gallery-wrapper::-webkit-scrollbar {
      height: 8px;
    }
    
    .gallery-wrapper::-webkit-scrollbar-track {
      background: rgba(0,0,0,0.1);
      border-radius: 4px;
    }
    
    .gallery-wrapper::-webkit-scrollbar-thumb {
      background: var(--primary-color);
      border-radius: 4px;
    }
    
    .gallery-wrapper::-webkit-scrollbar-thumb:hover {
      background: var(--primary-dark);
    }
    
    /* Efecto de desvanecimiento en los bordes */
    .gallery-container::before,
    .gallery-container::after {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      width: 40px;
      pointer-events: none;
      z-index: 1;
    }
    
    .gallery-container::before {
      left: 0;
      background: linear-gradient(to right, var(--bg-color), transparent);
    }
    
    .gallery-container::after {
      right: 0;
      background: linear-gradient(to left, var(--bg-color), transparent);
    }
    
    /* Efectos hover mejorados */
    .gallery-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.2) !important;
    }
    
    /* Etiquetas que aparecen solo en hover */
    .gallery-item:hover .gallery-label {
      opacity: 1 !important;
      transform: translateY(0) !important;
    }
    
    /* Estado por defecto de las etiquetas (invisibles) */
    .gallery-label {
      opacity: 0;
      transform: translateY(100%);
      transition: all 0.3s ease;
    }
    
    /* Responsive para móviles */
    @media (max-width: 768px) {
      .gallery-item {
        width: 240px !important;
        height: 160px !important;
      }
      
      .gallery-track {
        gap: 1rem !important;
        padding: 0 1rem !important;
      }
    }
    
    @media (max-width: 480px) {
      .gallery-item {
        width: 200px !important;
        height: 140px !important;
      }
    }
  </style>

  <script>
    function openModal(imageSrc, caption) {
      const modal = document.getElementById('imageModal');
      const modalImg = document.getElementById('modalImage');
      const modalCaption = document.getElementById('modalCaption');
      
      modal.style.display = 'block';
      modalImg.src = imageSrc;
      modalCaption.textContent = caption;
      
      // NO bloquear el scroll del body - permitir scroll libre
      // document.body.style.overflow = 'hidden'; // Comentado para permitir scroll
    }

    function closeModal() {
      const modal = document.getElementById('imageModal');
      modal.style.display = 'none';
      
      // NO es necesario restaurar scroll ya que no lo bloqueamos
      // document.body.style.overflow = 'auto';
    }

    // Cerrar modal al hacer clic fuera de la imagen
    document.getElementById('imageModal').onclick = function(event) {
      if (event.target === this) {
        closeModal();
      }
    }

    // Cerrar modal con tecla ESC
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        closeModal();
      }
    });

    // Prevenir que el modal se cierre al hacer clic en la imagen
    document.getElementById('modalImage').onclick = function(event) {
      event.stopPropagation();
    }

    // Prevenir que el modal se cierre al hacer clic en el caption
    document.getElementById('modalCaption').onclick = function(event) {
      event.stopPropagation();
    }
  </script>
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
  <h2>Conocé más sobre nosotros</h2>
  <div style="max-width: 800px; margin: 0 auto; text-align: center;">
    <div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; background: #000; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow);">
      <iframe 
        src="https://www.youtube.com/embed/9uru6TGV9GQ?rel=0&modestbranding=1&showinfo=0" 
        title="Ingenierio agronomo Cristian Zorzon, parte de la familia Zorzon"
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;">
      </iframe>
    </div>
    <p style="margin-top: 1rem; color: var(--text-dark); font-style: italic;">
      Ingeniero Agronomo Cristian Zorzon, parte de la familia fundadora y de la empresa
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
