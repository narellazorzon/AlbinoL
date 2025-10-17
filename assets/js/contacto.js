// JavaScript específico para la página de Contacto

// Validación del formulario de contacto
function validateForm() {
    const form = document.getElementById('contact-form');
    if (!form) return false;
    
    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');
    
    // Limpiar errores previos
    const errorElements = form.querySelectorAll('.form-error');
    errorElements.forEach(error => {
        error.classList.remove('show');
        error.textContent = '';
    });
    
    // Validar cada campo requerido
    requiredFields.forEach(field => {
        const value = field.value.trim();
        const errorElement = document.getElementById(field.id + '-error');
        
        if (!value) {
            isValid = false;
            if (errorElement) {
                errorElement.textContent = 'Este campo es obligatorio';
                errorElement.classList.add('show');
            }
        } else {
            // Validaciones específicas
            if (field.type === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    isValid = false;
                    if (errorElement) {
                        errorElement.textContent = 'Ingrese un email válido';
                        errorElement.classList.add('show');
                    }
                }
            }
        }
    });
    
    return isValid;
}

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

// Manejo del envío del formulario
document.addEventListener('DOMContentLoaded', function() {
    // Agregar clase para indicar que JavaScript está disponible
    document.body.classList.add('js-enabled');
    
    const form = document.getElementById('contact-form');
    if (!form) return;
    
    // Validación en tiempo real
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                const errorElement = document.getElementById(this.id + '-error');
                if (errorElement) {
                    errorElement.textContent = 'Este campo es obligatorio';
                    errorElement.classList.add('show');
                }
            }
        });
        
        input.addEventListener('input', function() {
            const errorElement = document.getElementById(this.id + '-error');
            if (errorElement && errorElement.classList.contains('show')) {
                errorElement.classList.remove('show');
                errorElement.textContent = '';
            }
        });
    });
    
    // Manejo del envío del formulario con JavaScript
    form.addEventListener('submit', function(e) {
        // Con reCAPTCHA en el botón, permitir el envío normal
        // El reCAPTCHA manejará la validación automáticamente
        return true;
    });
    
    // Carga inteligente del video para mejor rendimiento
    const video = document.getElementById('heroVideo');
    if (video) {
        // Cargar video solo cuando esté en viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    video.load();
                    observer.unobserve(video);
                }
            });
        });
        observer.observe(video);
        
        // Fallback: cargar después de 1 segundo si no está en viewport
        setTimeout(() => {
            if (video.readyState === 0) {
                video.load();
            }
        }, 1000);
    }
});
