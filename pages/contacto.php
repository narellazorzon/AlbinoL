<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../php/contacto-functions.php';

$title = "Contacto - Albino Luis Zorzon";
$desc = "Contactanos para conocer más sobre nuestros servicios agropecuarios. Estamos en Zona Rural La Lola, Santa Fe.";
include __DIR__ . "/../partials/header.php";
?>

<link rel="stylesheet" href="../assets/css/contacto.css">


<!-- Hero Section -->
<div class="hero fade-in-up">
  <video id="heroVideo" autoplay muted loop playsinline preload="none" poster="../assets/images/logo.png">
    <source src="../assets/videos/video_contacto.MP4" type="video/mp4">
    <!-- Fallback para navegadores que no soportan video -->
    Tu navegador no soporta videos HTML5.
  </video>
  <div class="hero-content">
    <h1>Contacto</h1>
    <p>Envíanos un mensaje y te contactaremos pronto</p>
  </div>
</div>

<!-- Mensajes de éxito/error -->
<?= generateMensajesHTML() ?>

<!-- Formulario de Contacto -->
<section class="fade-in-up contact-form-container">
  <!-- Marca de agua en formulario -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.08; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 100px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>Envíanos un Mensaje</h2>
  <div class="contact-form">
    <form id="contact-form"
          novalidate
          aria-labelledby="form-title"
          style="background: var(--cream-white); padding: 1.5rem; border-radius: 15px; box-shadow: var(--shadow);">
      
      <!-- Título oculto para lectores de pantalla -->
      <h3 id="form-title" class="sr-only">Formulario de contacto</h3>
      
      <!-- Instrucciones del formulario -->
      <div role="note" aria-live="polite" id="form-instructions" class="form-instructions">
        <p>Complete el formulario a continuación. Los campos marcados con asterisco (*) son obligatorios.</p>
      </div>
      
      <!-- Grupo de campos de información personal -->
      <fieldset style="border: none; margin: 0; padding: 0;">
        <legend class="sr-only">Información personal</legend>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="nombre" class="form-label">
            Nombre Completo <span class="required" aria-hidden="true">*</span>
            <span class="sr-only">requerido</span>
          </label>
          <input type="text" 
                 id="nombre" 
                 name="nombre" 
                 required 
                 aria-required="true"
                 aria-describedby="nombre-error"
                 autocomplete="name"
                 class="form-input"
                 placeholder="Ingrese su nombre completo">
          <div id="nombre-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="email" class="form-label">
            Correo Electrónico <span class="required" aria-hidden="true">*</span>
            <span class="sr-only">requerido</span>
          </label>
          <input type="email" 
                 id="email" 
                 name="email" 
                 required 
                 aria-required="true"
                 aria-describedby="email-error"
                 autocomplete="email"
                 class="form-input"
                 placeholder="ejemplo@correo.com">
          <div id="email-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="telefono" class="form-label">
            Teléfono
          </label>
          <input type="tel" 
                 id="telefono" 
                 name="telefono" 
                 aria-describedby="telefono-error"
                 autocomplete="tel"
                 class="form-input"
                 placeholder="Ingrese su teléfono (opcional)">
          <div id="telefono-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
      </fieldset>
      
      <!-- Grupo de campos de consulta -->
      <fieldset style="border: none; margin: 0; padding: 0;">
        <legend class="sr-only">Información de la consulta</legend>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="asunto" class="form-label">
            Asunto de la Consulta <span class="required" aria-hidden="true">*</span>
            <span class="sr-only">requerido</span>
          </label>
          <select id="asunto" 
                  name="asunto" 
                  required 
                  aria-required="true"
                  aria-describedby="asunto-error"
                  class="form-select">
            <?= generateAsuntoOpcionesHTML() ?>
          </select>
          <div id="asunto-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="mensaje" class="form-label">
            Mensaje <span class="required" aria-hidden="true">*</span>
            <span class="sr-only">requerido</span>
          </label>
          <textarea id="mensaje" 
                    name="mensaje" 
                    rows="4" 
                    required 
                    aria-required="true"
                    aria-describedby="mensaje-error"
                    class="form-textarea"
                    placeholder="Escriba su mensaje aquí..."></textarea>
          <div id="mensaje-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
      </fieldset>
      
      <!-- Grupo de botones -->
      <div class="form-actions" style="text-align: center; margin-top: 1.5rem;">
        <button type="submit" 
                class="btn btn-primary"
>
          <span class="btn-text">Enviar Mensaje</span>
          <span class="btn-icon" aria-hidden="true">📤</span>
        </button>
      </div>
      
      <!-- Mensaje de estado del formulario -->
      <div id="form-status" 
           class="form-status" 
           role="status" 
           aria-live="polite" 
           aria-atomic="true"
           style="margin-top: 1rem; padding: 1rem; border-radius: 8px; display: none;"></div>
    </form>
  </div>
</section>



<!-- Ubicación en Mapa -->
<section class="fade-in-up" style="position: relative;">
  <!-- Marca de agua en ubicación -->
  <div style="position: absolute; top: 20px; left: 20px; opacity: 0.06; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 80px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>¿Cómo Llegar?</h2>
  <div style="background: var(--cream-white); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow); text-align: center;">
    <p style="margin-bottom: 1.5rem; font-size: 1.1rem;">
      Estamos ubicados en la Zona Rural La Lola, Provincia de Santa Fe. 
      Para llegar a nuestras instalaciones, puedes contactarnos y te enviaremos las indicaciones detalladas.
    </p>
    <div style="background: var(--warm-beige); padding: 1.5rem; border-radius: 10px; margin: 1rem 0;">
      <h3 style="color: var(--earth-brown); margin-bottom: 1rem;">📍 Dirección Completa</h3>
      <p style="font-size: 1.1rem; line-height: 1.6;">
        <?= SITE_ADDRESS ?><br>
        <?= SITE_CITY ?><br>
        <?= SITE_COUNTRY ?>
      </p>
      </div>
    </div>
</section>


<!-- CTA -->
<section class="fade-in-up" style="text-align: center; position: relative;">
  <!-- Marca de agua en CTA -->
  <div style="position: absolute; top: 20px; right: 20px; opacity: 0.05; z-index: 1; pointer-events: none;">
    <img src="../assets/images/logo.png" alt="Albino Luis Zorzon e Hijos" style="width: 90px; height: auto; filter: grayscale(100%);">
  </div>
  <h2>¿Listo para Contactarnos?</h2>
  <div style="margin-top: 2rem;">
    <a href="#contact-form" class="btn">Envíanos un mensaje</a>
    <a href="../index.php" class="btn btn-secondary" style="margin-left: 1rem;">Volver al inicio</a>
  </div>
</section>

<script src="../assets/js/contacto.js"></script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
