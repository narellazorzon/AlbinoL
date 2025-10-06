<?php
require_once __DIR__ . '/../includes/config.php';

$title = "Contacto - Albino Luis Zorzon";
$desc = "Contactanos para conocer más sobre nuestros servicios agropecuarios. Estamos en Zona Rural La Lola, Santa Fe.";
include __DIR__ . "/../partials/header.php";
?>

<!-- Hero Section -->
<div class="hero fade-in-up" style="padding: 1.5rem 1rem;">
  <h1>📞 Contacto</h1>
  <p>Envíanos un mensaje y te contactaremos pronto</p>
</div>

<!-- Mensajes de éxito/error -->
<?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
<div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin: 1rem 0; text-align: center; border: 1px solid #c3e6cb;">
  ✅ ¡Mensaje enviado correctamente! Te contactaremos pronto.
</div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
<div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin: 1rem 0; text-align: center; border: 1px solid #f5c6cb;">
  ❌ Error: <?= htmlspecialchars($_GET['error']) ?>
</div>
<?php endif; ?>

<!-- Formulario de Contacto -->
<section class="fade-in-up" style="padding: 1rem;">
  <h2>Envíanos un Mensaje</h2>
  <div style="max-width: 600px; margin: 0 auto;">
    <form id="contact-form"
          novalidate
          role="form"
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
            Nombre Completo <span class="required" aria-label="requerido">*</span>
          </label>
          <input type="text" 
                 id="nombre" 
                 name="nombre" 
                 required 
                 aria-required="true"
                 aria-describedby="nombre-error nombre-help"
                 autocomplete="name"
                 class="form-input"
                 placeholder="Ingrese su nombre completo">
          <div id="nombre-help" class="form-help">Ingrese su nombre y apellido completos</div>
          <div id="nombre-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="email" class="form-label">
            Correo Electrónico <span class="required" aria-label="requerido">*</span>
          </label>
          <input type="email" 
                 id="email" 
                 name="email" 
                 required 
                 aria-required="true"
                 aria-describedby="email-error email-help"
                 autocomplete="email"
                 class="form-input"
                 placeholder="ejemplo@correo.com">
          <div id="email-help" class="form-help">Ingrese una dirección de correo válida</div>
          <div id="email-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="telefono" class="form-label">
            Teléfono
          </label>
          <input type="tel" 
                 id="telefono" 
                 name="telefono" 
                 aria-describedby="telefono-help telefono-error"
                 autocomplete="tel"
                 class="form-input"
                 placeholder="Ingrese su teléfono (opcional)">
          <div id="telefono-help" class="form-help">Ingrese su número de teléfono (opcional)</div>
          <div id="telefono-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
      </fieldset>
      
      <!-- Grupo de campos de consulta -->
      <fieldset style="border: none; margin: 0; padding: 0;">
        <legend class="sr-only">Información de la consulta</legend>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="asunto" class="form-label">
            Asunto de la Consulta <span class="required" aria-label="requerido">*</span>
          </label>
          <select id="asunto" 
                  name="asunto" 
                  required 
                  aria-required="true"
                  aria-describedby="asunto-error asunto-help"
                  class="form-select">
            <option value="">Seleccione un asunto</option>
            <option value="agricultura">Consulta sobre Agricultura</option>
            <option value="ganaderia">Consulta sobre Ganadería</option>
            <option value="maquinaria">Consulta sobre Maquinaria</option>
            <option value="logistica">Consulta sobre Logística</option>
            <option value="trabajo">Oportunidades Laborales</option>
            <option value="general">Consulta General</option>
          </select>
          <div id="asunto-help" class="form-help">Seleccione el tema de su consulta</div>
          <div id="asunto-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
        
        <div class="form-group" style="margin-bottom: 1rem;">
          <label for="mensaje" class="form-label">
            Mensaje <span class="required" aria-label="requerido">*</span>
          </label>
          <textarea id="mensaje" 
                    name="mensaje" 
                    rows="4" 
                    required 
                    aria-required="true"
                    aria-describedby="mensaje-error mensaje-help"
                    class="form-textarea"
                    placeholder="Escriba su mensaje aquí..."></textarea>
          <div id="mensaje-help" class="form-help">Describa su consulta o solicitud en detalle</div>
          <div id="mensaje-error" class="form-error" role="alert" aria-live="polite"></div>
        </div>
      </fieldset>
      
      <!-- Grupo de botones -->
      <div class="form-actions" style="text-align: center; margin-top: 1.5rem;">
        <button type="submit" 
                class="btn btn-primary"
                aria-describedby="submit-help">
          <span class="btn-text">Enviar Mensaje</span>
          <span class="btn-icon" aria-hidden="true">📤</span>
        </button>
        <button type="reset" 
                class="btn btn-secondary"
                style="margin-left: 1rem;">
          <span class="btn-text">Limpiar Formulario</span>
          <span class="btn-icon" aria-hidden="true">🔄</span>
        </button>
        <div id="submit-help" class="form-help" style="margin-top: 0.5rem;">
          Al enviar el formulario, recibirá una confirmación por correo electrónico
        </div>
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

<!-- Trabajo con Nosotros -->
<section class="fade-in-up" style="background: linear-gradient(135deg, var(--warm-beige) 0%, var(--cream-white) 100%); padding: 1.5rem; border-radius: 15px; margin: 1.5rem 0; box-shadow: var(--shadow);">
  <h2>💼 Trabajo con Nosotros</h2>
  <div style="text-align: center; max-width: 600px; margin: 0 auto;">
    <p style="font-size: 1rem; margin-bottom: 1rem; color: var(--text-dark);">
      ¿Te interesa formar parte de nuestro equipo familiar? En <strong>Albino Luis Zorzon e Hijos</strong> valoramos el trabajo en equipo, la pasión por el campo y el compromiso con la excelencia.
    </p>
    
    <div style="background: rgba(255, 255, 255, 0.8); padding: 1rem; border-radius: 10px; margin: 1rem 0;">
      <h3 style="color: var(--primary-green); margin-bottom: 0.8rem;">📧 Envía tu CV</h3>
      <p style="margin-bottom: 0.8rem;">
        Si querés trabajar con nosotros, enviá tu <strong>Currículum Vitae</strong> a:
      </p>
      <a href="mailto:<?= SITE_EMAIL ?>?subject=Postulación Laboral - CV" 
         style="display: inline-block; background: var(--primary-green); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600; font-size: 1rem; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(45, 80, 22, 0.3);">
        📧 <?= SITE_EMAIL ?>
      </a>
      <p style="margin-top: 0.8rem; font-size: 0.85rem; color: #666;">
        Asunto sugerido: "Postulación Laboral - CV"
      </p>
    </div>
  </div>
</section>


<!-- Ubicación en Mapa -->
<section class="fade-in-up">
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

</section>


<!-- CTA -->
<section class="fade-in-up" style="text-align: center;">
  <h2>¿Listo para Contactarnos?</h2>
  <p>No dudes en contactarnos. Estamos aquí para ayudarte con todas tus necesidades agropecuarias.</p>
  <div style="margin-top: 2rem;">
    <a href="mailto:<?= SITE_EMAIL ?>" class="btn">Enviar Email</a>
    <a href="../index.php" class="btn btn-secondary" style="margin-left: 1rem;">Volver al inicio</a>
  </div>
</section>

<script>
// Script simple para manejar el formulario de contacto
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validación básica
        const nombre = form.querySelector('#nombre').value.trim();
        const email = form.querySelector('#email').value.trim();
        const mensaje = form.querySelector('#mensaje').value.trim();
        
        if (!nombre || !email || !mensaje) {
            alert('❌ Por favor complete todos los campos obligatorios.');
            return;
        }
        
        if (mensaje.length < 5) {
            alert('❌ El mensaje debe tener al menos 5 caracteres.');
            return;
        }
        
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="btn-text">Enviando...</span><span class="btn-icon" aria-hidden="true">⏳</span>';
        
        const formData = new FormData(form);
        
        fetch('../includes/enviar-mensaje.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('✅ ' + data.message);
                form.reset();
            } else {
                alert('❌ ' + (data.message || 'Error al enviar el mensaje'));
            }
        })
        .catch(error => {
            alert('❌ Error al enviar el mensaje. Intente nuevamente.');
            console.error('Error:', error);
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });
});
</script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
