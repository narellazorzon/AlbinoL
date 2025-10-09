/**
 * Sistema de validación avanzada para formulario de contacto
 * Albino Luis Zorzon e hijos - Anti-spam y anti-bot
 */

class ContactFormValidator {
    constructor() {
        this.form = document.getElementById('contact-form');
        this.fields = {
            nombre: document.getElementById('nombre'),
            email: document.getElementById('email'),
            telefono: document.getElementById('telefono'),
            asunto: document.getElementById('asunto'),
            mensaje: document.getElementById('mensaje')
        };
        
        this.init();
    }
    
    init() {
        if (!this.form) return;
        
        // Event listeners
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
        
        // Validación en tiempo real
        Object.values(this.fields).forEach(field => {
            if (field) {
                field.addEventListener('blur', () => this.validateField(field));
                field.addEventListener('input', () => this.clearError(field));
            }
        });
    }
    
    handleSubmit(e) {
        e.preventDefault();
        
        // Limpiar errores anteriores
        this.clearAllErrors();
        
        // Validar todos los campos
        const isValid = this.validateAllFields();
        
        if (isValid) {
            this.submitForm();
        } else {
            this.showFormError('Por favor, corrija los errores antes de enviar el formulario.');
        }
    }
    
    validateAllFields() {
        let isValid = true;
        
        // Validar nombre
        if (!this.validateNombre(this.fields.nombre)) {
            isValid = false;
        }
        
        // Validar email
        if (!this.validateEmail(this.fields.email)) {
            isValid = false;
        }
        
        // Validar teléfono (opcional)
        if (this.fields.telefono.value.trim() && !this.validateTelefono(this.fields.telefono)) {
            isValid = false;
        }
        
        // Validar asunto
        if (!this.validateAsunto(this.fields.asunto)) {
            isValid = false;
        }
        
        // Validar mensaje
        if (!this.validateMensaje(this.fields.mensaje)) {
            isValid = false;
        }
        
        return isValid;
    }
    
    validateField(field) {
        switch (field.name) {
            case 'nombre':
                return this.validateNombre(field);
            case 'email':
                return this.validateEmail(field);
            case 'telefono':
                return this.validateTelefono(field);
            case 'asunto':
                return this.validateAsunto(field);
            case 'mensaje':
                return this.validateMensaje(field);
            default:
                return true;
        }
    }
    
    validateNombre(field) {
        const value = field.value.trim();
        const errorElement = document.getElementById('nombre-error');
        
        if (!value) {
            this.showFieldError(field, errorElement, 'El nombre es obligatorio.');
            return false;
        }
        
        if (value.length < 3) {
            this.showFieldError(field, errorElement, 'El nombre debe tener al menos 3 caracteres.');
            return false;
        }
        
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) {
            this.showFieldError(field, errorElement, 'El nombre solo puede contener letras y espacios.');
            return false;
        }
        
        this.clearFieldError(field, errorElement);
        return true;
    }
    
    validateEmail(field) {
        const value = field.value.trim();
        const errorElement = document.getElementById('email-error');
        
        if (!value) {
            this.showFieldError(field, errorElement, 'El email es obligatorio.');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            this.showFieldError(field, errorElement, 'Por favor, ingrese un email válido.');
            return false;
        }
        
        this.clearFieldError(field, errorElement);
        return true;
    }
    
    validateTelefono(field) {
        const value = field.value.trim();
        const errorElement = document.getElementById('telefono-error');
        
        if (!value) {
            this.clearFieldError(field, errorElement);
            return true; // Teléfono es opcional
        }
        
        const phoneRegex = /^[0-9]{7,15}$/;
        if (!phoneRegex.test(value)) {
            this.showFieldError(field, errorElement, 'El teléfono debe contener solo números y tener entre 7 y 15 dígitos.');
            return false;
        }
        
        this.clearFieldError(field, errorElement);
        return true;
    }
    
    validateAsunto(field) {
        const value = field.value.trim();
        const errorElement = document.getElementById('asunto-error');
        
        if (!value || value === '') {
            this.showFieldError(field, errorElement, 'Por favor, seleccione un asunto.');
            return false;
        }
        
        this.clearFieldError(field, errorElement);
        return true;
    }
    
    validateMensaje(field) {
        const value = field.value.trim();
        const errorElement = document.getElementById('mensaje-error');
        
        if (!value) {
            this.showFieldError(field, errorElement, 'El mensaje es obligatorio.');
            return false;
        }
        
        if (value.length < 10) {
            this.showFieldError(field, errorElement, 'El mensaje debe tener al menos 10 caracteres.');
            return false;
        }
        
        if (value.length > 1000) {
            this.showFieldError(field, errorElement, 'El mensaje no puede exceder los 1000 caracteres.');
            return false;
        }
        
        this.clearFieldError(field, errorElement);
        return true;
    }
    
    showFieldError(field, errorElement, message) {
        field.setAttribute('aria-invalid', 'true');
        field.classList.add('error');
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.setAttribute('aria-live', 'polite');
        }
    }
    
    clearFieldError(field, errorElement) {
        field.setAttribute('aria-invalid', 'false');
        field.classList.remove('error');
        if (errorElement) {
            errorElement.textContent = '';
        }
    }
    
    clearError(field) {
        const errorElement = document.getElementById(field.name + '-error');
        this.clearFieldError(field, errorElement);
    }
    
    clearAllErrors() {
        Object.values(this.fields).forEach(field => {
            if (field) {
                const errorElement = document.getElementById(field.name + '-error');
                this.clearFieldError(field, errorElement);
            }
        });
    }
    
    showFormError(message) {
        const instructions = document.getElementById('form-instructions');
        if (instructions) {
            instructions.innerHTML = `<p style="color: #d32f2f; font-weight: 500;">${message}</p>`;
        }
    }
    
    showFormSuccess(message) {
        const instructions = document.getElementById('form-instructions');
        if (instructions) {
            instructions.innerHTML = `<p style="color: #2e7d32; font-weight: 500;">${message}</p>`;
        }
    }
    
    async submitForm() {
        const submitBtn = this.form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Mostrar estado de carga
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';
        
        try {
            const formData = new FormData(this.form);
            
            const response = await fetch('../includes/enviar-mensaje.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                this.showFormSuccess(result.message);
                this.form.reset();
                this.clearAllErrors();
                
                // Scroll al formulario
                this.form.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                this.showFormError(result.message);
            }
            
        } catch (error) {
            console.error('Error al enviar formulario:', error);
            this.showFormError('Error de conexión. Por favor, intente nuevamente.');
        } finally {
            // Restaurar botón
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    new ContactFormValidator();
});
