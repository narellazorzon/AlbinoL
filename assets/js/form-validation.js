// Formulario de Contacto - Validación Accesible
// Cumple con WCAG 2.1 AA para accesibilidad web

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#contact-form');
    if (!form) return;

    // Elementos del formulario
    const nombreInput = document.getElementById('nombre');
    const emailInput = document.getElementById('email');
    const telefonoInput = document.getElementById('telefono');
    const asuntoSelect = document.getElementById('asunto');
    const mensajeTextarea = document.getElementById('mensaje');
    const formStatus = document.getElementById('form-status');
    const formInstructions = document.getElementById('form-instructions');

    // Patrones de validación
    const patterns = {
        nombre: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\.]{2,100}$/,
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        telefono: /^[\+]?[0-9\s\-\(\)]{10,20}$/,
        mensaje: /^.{5,2000}$/
    };

    // Mensajes de error
    const errorMessages = {
        nombre: {
            required: 'El nombre es obligatorio',
            pattern: 'El nombre debe tener entre 2 y 100 caracteres y solo contener letras y puntos',
            minLength: 'El nombre debe tener al menos 2 caracteres',
            maxLength: 'El nombre no puede tener más de 100 caracteres'
        },
        email: {
            required: 'El correo electrónico es obligatorio',
            pattern: 'Ingrese una dirección de correo electrónico válida',
            invalid: 'El formato del correo electrónico no es válido'
        },
        telefono: {
            pattern: 'Ingrese un número de teléfono válido (10-20 dígitos)',
            invalid: 'El formato del teléfono no es válido'
        },
        asunto: {
            required: 'Debe seleccionar un asunto para su consulta',
            invalid: 'Seleccione una opción válida'
        },
        mensaje: {
            required: 'El mensaje es obligatorio',
            pattern: 'El mensaje debe tener entre 5 y 2000 caracteres',
            minLength: 'El mensaje debe tener al menos 5 caracteres',
            maxLength: 'El mensaje no puede tener más de 2000 caracteres'
        }
    };

    // Función para mostrar errores de forma accesible
    function showError(field, message) {
        const formGroup = field.closest('.form-group');
        const errorElement = formGroup.querySelector('.form-error');
        
        // Agregar clase de error
        formGroup.classList.add('error');
        
        // Mostrar mensaje de error
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.add('show');
        }
        
        // Anunciar error a lectores de pantalla
        field.setAttribute('aria-invalid', 'true');
        
        // Enfocar el campo con error
        field.focus();
        
        // Actualizar estado del formulario
        updateFormStatus('error', `Error en ${field.name}: ${message}`);
    }

    // Función para limpiar errores
    function clearError(field) {
        const formGroup = field.closest('.form-group');
        const errorElement = formGroup.querySelector('.form-error');
        
        // Remover clase de error
        formGroup.classList.remove('error');
        
        // Ocultar mensaje de error
        if (errorElement) {
            errorElement.classList.remove('show');
            errorElement.textContent = '';
        }
        
        // Actualizar atributo ARIA
        field.setAttribute('aria-invalid', 'false');
    }

    // Función para validar campo individual
    function validateField(field) {
        const fieldName = field.name;
        const value = field.value.trim();
        
        // Limpiar errores previos
        clearError(field);
        
        // Validar campos requeridos
        if (field.hasAttribute('required') && !value) {
            showError(field, errorMessages[fieldName].required);
            return false;
        }
        
        // Si el campo está vacío y no es requerido, es válido
        if (!value && !field.hasAttribute('required')) {
            return true;
        }
        
        // Validar patrones
        if (patterns[fieldName] && !patterns[fieldName].test(value)) {
            showError(field, errorMessages[fieldName].pattern);
            return false;
        }
        
        // Validaciones específicas
        switch (fieldName) {
            case 'nombre':
                if (value.length < 2) {
                    showError(field, errorMessages[fieldName].minLength);
                    return false;
                }
                if (value.length > 50) {
                    showError(field, errorMessages[fieldName].maxLength);
                    return false;
                }
                break;
                
            case 'email':
                if (!isValidEmail(value)) {
                    showError(field, errorMessages[fieldName].invalid);
                    return false;
                }
                break;
                
            case 'telefono':
                if (value && !isValidPhone(value)) {
                    showError(field, errorMessages[fieldName].invalid);
                    return false;
                }
                break;
                
            case 'mensaje':
                if (value.length < 5) {
                    showError(field, errorMessages[fieldName].minLength);
                    return false;
                }
                if (value.length > 2000) {
                    showError(field, errorMessages[fieldName].maxLength);
                    return false;
                }
                break;
        }
        
        return true;
    }

    // Función para validar email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Función para validar teléfono
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,20}$/;
        return phoneRegex.test(phone);
    }

    // Función para validar todo el formulario
    function validateForm() {
        const fields = [nombreInput, emailInput, asuntoSelect, mensajeTextarea];
        let isValid = true;
        
        fields.forEach(field => {
            if (!validateField(field)) {
                isValid = false;
            }
        });
        
        // Validar teléfono solo si tiene contenido
        if (telefonoInput.value.trim()) {
            if (!validateField(telefonoInput)) {
                isValid = false;
            }
        }
        
        return isValid;
    }

    // Función para actualizar estado del formulario
    function updateFormStatus(type, message) {
        if (!formStatus) return;
        
        formStatus.className = `form-status ${type}`;
        formStatus.textContent = message;
        formStatus.style.display = 'block';
        
        // Anunciar a lectores de pantalla
        formStatus.setAttribute('aria-live', 'polite');
    }

    // Función para limpiar formulario
    function clearForm() {
        const fields = [nombreInput, emailInput, telefonoInput, asuntoSelect, mensajeTextarea];
        
        fields.forEach(field => {
            field.value = '';
            clearError(field);
        });
        
        if (formStatus) {
            formStatus.style.display = 'none';
        }
        
        // Enfocar el primer campo
        nombreInput.focus();
        
        updateFormStatus('info', 'Formulario limpiado. Complete los campos nuevamente.');
    }

    // Event listeners para validación en tiempo real
    [nombreInput, emailInput, telefonoInput, asuntoSelect, mensajeTextarea].forEach(field => {
        if (!field) return;
        
        // Validar al perder el foco
        field.addEventListener('blur', function() {
            validateField(this);
        });
        
        // Limpiar errores al empezar a escribir
        field.addEventListener('input', function() {
            if (this.closest('.form-group').classList.contains('error')) {
                clearError(this);
            }
        });
        
        // Validar al presionar Enter
        field.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                validateField(this);
                
                // Mover al siguiente campo si es válido
                if (validateField(this)) {
                    const fields = [nombreInput, emailInput, telefonoInput, asuntoSelect, mensajeTextarea];
                    const currentIndex = fields.indexOf(this);
                    if (currentIndex < fields.length - 1) {
                        fields[currentIndex + 1].focus();
                    }
                }
            }
        });
    });

    // Event listener para envío del formulario
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar formulario completo
        if (!validateForm()) {
            updateFormStatus('error', 'Por favor, corrija los errores antes de enviar el formulario.');
            
            // Enfocar el primer campo con error
            const firstError = form.querySelector('.form-group.error input, .form-group.error select, .form-group.error textarea');
            if (firstError) {
                firstError.focus();
            }
            
            return;
        }
        
        // Mostrar estado de envío
        updateFormStatus('info', 'Enviando mensaje...');
        
        // Deshabilitar botón de envío
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="btn-text">Enviando...</span><span class="btn-icon" aria-hidden="true">⏳</span>';
        
        // Enviar formulario
        const formData = new FormData(form);
        
        fetch('../includes/enviar-mensaje.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Error en el servidor');
        })
        .then(data => {
            if (data.success) {
                updateFormStatus('success', data.message);
                clearForm();
            } else {
                updateFormStatus('error', data.message || 'Error al enviar el mensaje');
            }
        })
        .catch(error => {
            updateFormStatus('error', 'Error al enviar el mensaje. Intente nuevamente.');
            console.error('Error:', error);
        })
        .finally(() => {
            // Restaurar botón
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });

    // Event listener para botón de reset
    const resetBtn = form.querySelector('button[type="reset"]');
    if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            clearForm();
        });
    }

    // Mejorar navegación por teclado
    form.addEventListener('keydown', function(e) {
        // Tab para navegar entre campos
        if (e.key === 'Tab') {
            const fields = [nombreInput, emailInput, telefonoInput, asuntoSelect, mensajeTextarea];
            const currentField = document.activeElement;
            const currentIndex = fields.indexOf(currentField);
            
            if (e.shiftKey) {
                // Shift + Tab (navegación hacia atrás)
                if (currentIndex > 0) {
                    e.preventDefault();
                    fields[currentIndex - 1].focus();
                }
            } else {
                // Tab (navegación hacia adelante)
                if (currentIndex < fields.length - 1) {
                    e.preventDefault();
                    fields[currentIndex + 1].focus();
                }
            }
        }
    });

    // Inicializar estado del formulario
    updateFormStatus('info', 'Complete el formulario para contactarnos. Los campos marcados con * son obligatorios.');
    
    console.log('✅ Formulario de contacto accesible inicializado correctamente');
});
