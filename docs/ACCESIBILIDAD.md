# Accesibilidad del Formulario de Contacto

Este documento describe las características de accesibilidad implementadas en el formulario de contacto del sitio web de Albino Luis Zorzon e hijos.

## ✅ Cumplimiento WCAG 2.1 AA

El formulario cumple con las pautas de accesibilidad web WCAG 2.1 nivel AA, garantizando que sea accesible para usuarios con discapacidades.

## 🎯 Características de Accesibilidad Implementadas

### 1. **Estructura Semántica**
- Uso de elementos HTML semánticos (`<form>`, `<fieldset>`, `<legend>`, `<label>`)
- Jerarquía de encabezados apropiada
- Agrupación lógica de campos relacionados

### 2. **Etiquetas y Asociaciones**
- Cada campo tiene una etiqueta asociada (`<label for="campo">`)
- Etiquetas descriptivas y claras
- Indicación visual de campos requeridos con asterisco (*)
- Atributo `aria-label` para elementos que no tienen etiqueta visible

### 3. **Navegación por Teclado**
- Todos los elementos son accesibles mediante teclado
- Orden de tabulación lógico
- Navegación con Tab y Shift+Tab
- Soporte para Enter en campos de texto

### 4. **Indicadores de Estado**
- Campos requeridos claramente marcados
- Validación en tiempo real con mensajes de error
- Estados de éxito y error anunciados a lectores de pantalla
- Atributos ARIA para indicar estado de validación

### 5. **Contraste y Visibilidad**
- Contraste de color superior a 4.5:1 (WCAG AA)
- Indicadores de error en rojo (#dc3545)
- Indicadores de éxito en verde (#28a745)
- Bordes de enfoque visibles

### 6. **Tamaños Táctiles**
- Elementos interactivos con mínimo 44x44 píxeles
- Espaciado adecuado entre elementos
- Botones de tamaño apropiado para dispositivos táctiles

### 7. **Lectores de Pantalla**
- Atributos ARIA apropiados (`aria-required`, `aria-invalid`, `aria-describedby`)
- Mensajes de error anunciados automáticamente
- Instrucciones del formulario accesibles
- Roles semánticos (`role="form"`, `role="alert"`)

### 8. **Validación Accesible**
- Validación en tiempo real sin interrumpir la experiencia
- Mensajes de error específicos y útiles
- Validación tanto en cliente como en servidor
- Prevención de envío con errores

### 9. **Autocompletado**
- Atributos `autocomplete` apropiados
- Sugerencias del navegador para campos comunes
- Mejora de la experiencia del usuario

### 10. **Responsive Design**
- Formulario adaptable a diferentes tamaños de pantalla
- Tamaños de fuente apropiados (mínimo 16px en móviles)
- Botones de ancho completo en dispositivos móviles

## 🔧 Atributos ARIA Utilizados

### Formulario Principal
- `role="form"` - Identifica el formulario
- `aria-labelledby="form-title"` - Asocia con el título
- `novalidate` - Desactiva validación nativa para control personalizado

### Campos de Entrada
- `aria-required="true"` - Indica campos obligatorios
- `aria-invalid="true/false"` - Estado de validación
- `aria-describedby` - Asocia con mensajes de ayuda y error
- `autocomplete` - Sugerencias de autocompletado

### Mensajes de Error
- `role="alert"` - Anuncia errores inmediatamente
- `aria-live="polite"` - Anuncia cambios sin interrumpir

### Botones
- `aria-describedby` - Información adicional sobre la acción
- `aria-hidden="true"` - Oculta iconos decorativos

## 📱 Compatibilidad con Dispositivos

### Navegadores Soportados
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

### Lectores de Pantalla
- NVDA (Windows)
- JAWS (Windows)
- VoiceOver (macOS/iOS)
- TalkBack (Android)

### Dispositivos de Entrada
- Teclado estándar
- Navegación por teclado
- Dispositivos táctiles
- Dispositivos de asistencia

## 🧪 Pruebas de Accesibilidad

### Herramientas Utilizadas
- WAVE (Web Accessibility Evaluator)
- axe DevTools
- Lighthouse Accessibility Audit
- Pruebas manuales con lectores de pantalla

### Criterios Verificados
- ✅ Perceivable (1.1, 1.3, 1.4)
- ✅ Operable (2.1, 2.4, 2.5)
- ✅ Understandable (3.1, 3.2, 3.3)
- ✅ Robust (4.1)

## 🚀 Mejoras Futuras

### Posibles Mejoras
- [ ] Soporte para navegación con teclas de flecha en select
- [ ] Validación con patrones más específicos
- [ ] Mensajes de error más descriptivos
- [ ] Soporte para múltiples idiomas
- [ ] Integración con servicios de verificación de email

### Monitoreo Continuo
- Revisión regular de estándares WCAG
- Pruebas con usuarios reales
- Actualización de herramientas de validación
- Feedback de usuarios con discapacidades

## 📞 Soporte

Para reportar problemas de accesibilidad o sugerir mejoras, contactar:
- Email: alzorzon@gmail.com
- Teléfono: +54 9 11 1234-5678

---

**Última actualización:** <?= date('d/m/Y') ?>
**Versión:** 1.0
**Estándar:** WCAG 2.1 AA
