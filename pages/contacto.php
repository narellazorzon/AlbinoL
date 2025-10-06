<?php
require_once __DIR__ . '/../includes/config.php';

$title = "Contacto - Albino Luis Zorzon";
$desc = "Contactanos para conocer más sobre nuestros servicios agropecuarios. Estamos en Zona Rural La Lola, Santa Fe.";
include __DIR__ . "/../partials/header.php";
?>


<!-- Hero Section -->
<div class="hero fade-in-up">
  <video autoplay muted loop playsinline>
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
            <option value="general">Consulta General</option>
            <option value="trabajo">Oportunidades Laborales</option>
          </select>
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
  <div style="margin-top: 2rem;">
    <a href="#contact-form" class="btn">Envíanos un mensaje</a>
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
        
        // Agregar clase para mostrar errores de validación
        form.classList.add('form-submitted');
        
        // Validación básica
        const nombre = form.querySelector('#nombre').value.trim();
        const email = form.querySelector('#email').value.trim();
        const asunto = form.querySelector('#asunto').value.trim();
        const mensaje = form.querySelector('#mensaje').value.trim();
        
        if (!nombre || !email || !asunto || !mensaje) {
            // Crear mensaje de error estilizado
            const errorDiv = document.createElement('div');
            errorDiv.innerHTML = `
                <div class="error-message" style="
                    position: fixed;
                    top: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: linear-gradient(135deg, #ff6b6b, #ee5a52);
                    color: white;
                    padding: 12px 20px;
                    border-radius: 10px;
                    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
                    font-family: 'Source Sans Pro', sans-serif;
                    font-weight: 600;
                    font-size: 14px;
                    z-index: 10000;
                    animation: slideDown 0.3s ease-out;
                    border-left: 4px solid #ff4757;
                    max-width: 90%;
                    width: auto;
                    min-width: 280px;
                    text-align: center;
                    word-wrap: break-word;
                ">
                    <span style="font-size: 18px; margin-right: 8px;">⚠️</span>
                    <span style="display: inline-block;">Por favor complete todos los campos obligatorios (incluyendo el asunto de la consulta)</span>
                </div>
                <style>
                    @keyframes slideDown {
                        from { opacity: 0; transform: translateX(-50%) translateY(-20px); }
                        to { opacity: 1; transform: translateX(-50%) translateY(0); }
                    }
                    @keyframes slideUp {
                        from { opacity: 1; transform: translateX(-50%) translateY(0); }
                        to { opacity: 0; transform: translateX(-50%) translateY(-20px); }
                    }
                    @media (max-width: 768px) {
                        .error-message {
                            top: 10px !important;
                            left: 10px !important;
                            right: 10px !important;
                            transform: none !important;
                            max-width: none !important;
                            width: auto !important;
                            font-size: 13px !important;
                            padding: 10px 15px !important;
                        }
                    }
                    @media (max-width: 480px) {
                        .error-message {
                            font-size: 12px !important;
                            padding: 8px 12px !important;
                        }
                    }
                </style>
            `;
            document.body.appendChild(errorDiv);
            
            // Remover el mensaje después de 4 segundos
            setTimeout(() => {
                errorDiv.style.animation = 'slideUp 0.3s ease-out';
                setTimeout(() => errorDiv.remove(), 300);
            }, 4000);
            
            return;
        }
        
        if (mensaje.length < 5) {
            // Crear mensaje de error estilizado
            const errorDiv = document.createElement('div');
            errorDiv.innerHTML = `
                <div class="error-message" style="
                    position: fixed;
                    top: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: linear-gradient(135deg, #ff6b6b, #ee5a52);
                    color: white;
                    padding: 12px 20px;
                    border-radius: 10px;
                    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
                    font-family: 'Source Sans Pro', sans-serif;
                    font-weight: 600;
                    font-size: 14px;
                    z-index: 10000;
                    animation: slideDown 0.3s ease-out;
                    border-left: 4px solid #ff4757;
                    max-width: 90%;
                    width: auto;
                    min-width: 280px;
                    text-align: center;
                    word-wrap: break-word;
                ">
                    <span style="font-size: 18px; margin-right: 8px;">📝</span>
                    <span style="display: inline-block;">El mensaje debe tener al menos 5 caracteres</span>
                </div>
                <style>
                    @keyframes slideDown {
                        from { opacity: 0; transform: translateX(-50%) translateY(-20px); }
                        to { opacity: 1; transform: translateX(-50%) translateY(0); }
                    }
                    @keyframes slideUp {
                        from { opacity: 1; transform: translateX(-50%) translateY(0); }
                        to { opacity: 0; transform: translateX(-50%) translateY(-20px); }
                    }
                    @media (max-width: 768px) {
                        .error-message {
                            top: 10px !important;
                            left: 10px !important;
                            right: 10px !important;
                            transform: none !important;
                            max-width: none !important;
                            width: auto !important;
                            font-size: 13px !important;
                            padding: 10px 15px !important;
                        }
                    }
                    @media (max-width: 480px) {
                        .error-message {
                            font-size: 12px !important;
                            padding: 8px 12px !important;
                        }
                    }
                </style>
            `;
            document.body.appendChild(errorDiv);
            
            // Remover el mensaje después de 4 segundos
            setTimeout(() => {
                errorDiv.style.animation = 'slideUp 0.3s ease-out';
                setTimeout(() => errorDiv.remove(), 300);
            }, 4000);
            
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
                showNotification('success', '¡Mensaje Enviado!', data.message);
                form.reset();
                form.classList.remove('form-submitted');
            } else {
                showNotification('error', 'Error al Enviar', data.message || 'Error al enviar el mensaje');
            }
        })
        .catch(error => {
            showNotification('error', 'Error de Conexión', 'Error al enviar el mensaje. Intente nuevamente.');
            console.error('Error:', error);
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });
});

// Función para mostrar notificaciones estilizadas
function showNotification(type, title, message) {
    // Remover notificaciones existentes
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Crear la notificación
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    
    // Iconos según el tipo
    const icons = {
        success: '✅',
        error: '❌',
        info: 'ℹ️'
    };
    
    notification.innerHTML = `
        <span class="notification-icon">${icons[type] || 'ℹ️'}</span>
        <div class="notification-content">
            <div class="notification-title">${title}</div>
            <div class="notification-message">${message}</div>
        </div>
        <button class="notification-close" onclick="this.parentElement.remove()" aria-label="Cerrar notificación">×</button>
    `;
    
    // Agregar al DOM
    document.body.appendChild(notification);
    
    // Efecto de pulso para notificaciones de éxito
    if (type === 'success') {
        setTimeout(() => {
            notification.classList.add('pulse');
        }, 100);
    }
    
    // Auto-remover después de 5 segundos
    setTimeout(() => {
        if (notification.parentElement) {
            notification.style.animation = 'slideUp 0.3s ease-out';
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 300);
        }
    }, 5000);
    
    // Agregar evento de click para cerrar
    notification.addEventListener('click', (e) => {
        if (e.target.classList.contains('notification-close') || e.target === notification) {
            notification.style.animation = 'slideUp 0.3s ease-out';
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 300);
        }
    });
}
</script>

<?php include __DIR__ . "/../partials/footer.php"; ?>
