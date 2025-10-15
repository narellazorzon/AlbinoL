# 🚀 Guía de Desarrollo Local - AlbinoL

## ❌ Problema Resuelto: Error de Certificado SSL

El error **"La conexión no es privada"** y **"net::ERR_CERT_AUTHORITY_INVALID"** se debe a que el `.htaccess` optimizado está forzando redirecciones HTTPS, pero XAMPP localhost no tiene certificado SSL válido.

## ✅ Solución Implementada

### Opción 1: Usar el Switcher Automático (Recomendado)

1. **Ejecuta el script automático:**
   ```bash
   # En Windows
   switch-env.bat
   
   # Selecciona opción 1 para DESARROLLO
   ```

2. **El script automáticamente:**
   - Cambia a configuración de desarrollo
   - Desactiva redirecciones HTTPS
   - Reduce caché para ver cambios inmediatamente
   - Mantiene optimizaciones básicas

### Opción 2: Cambio Manual

1. **Para DESARROLLO (localhost):**
   ```bash
   # Renombra archivos
   ren .htaccess .htaccess.backup
   ren .htaccess.localhost .htaccess
   ```

2. **Para PRODUCCIÓN (servidor):**
   ```bash
   # Restaura configuración optimizada
   ren .htaccess .htaccess.localhost
   ren .htaccess.backup .htaccess
   ```

## 🔧 Configuraciones por Entorno

### 🏠 DESARROLLO LOCAL (.htaccess.localhost)
- ✅ **Sin redirecciones HTTPS** (evita errores de certificado)
- ✅ **Caché reducido** (1 hora máximo)
- ✅ **Compresión básica** para testing
- ✅ **Headers de seguridad relajados**
- ✅ **Sin forzar HTTPS** en localhost

### 🌐 PRODUCCIÓN (.htaccess)
- ✅ **Redirecciones HTTPS** automáticas
- ✅ **Caché agresivo** (30 días imágenes, 7 días CSS/JS)
- ✅ **Compresión GZIP + Brotli** completa
- ✅ **Headers de seguridad** estrictos
- ✅ **Optimizaciones móviles** completas

## 📱 Optimizaciones Mantenidas en Ambos Entornos

### HTML Optimizado
- ✅ **Preload de recursos críticos**
- ✅ **Estilos críticos inline**
- ✅ **Scripts con defer**
- ✅ **Videos con fetchpriority="high"**

### Performance
- ✅ **Compresión de archivos**
- ✅ **Caché de recursos estáticos**
- ✅ **Preconnect para recursos externos**
- ✅ **DNS-prefetch optimizado**

## 🚨 Solución Rápida al Error

Si sigues viendo el error de certificado:

1. **Limpia caché del navegador:**
   - Chrome: `Ctrl + Shift + Delete`
   - Firefox: `Ctrl + Shift + Delete`

2. **Accede directamente a:**
   ```
   http://localhost/AlbinoL/
   ```
   (Sin HTTPS)

3. **Verifica que el .htaccess correcto esté activo:**
   - Debe ser `.htaccess.localhost` renombrado a `.htaccess`

## 🔄 Flujo de Trabajo Recomendado

### Para Desarrollo Diario:
```bash
# 1. Activar modo desarrollo
switch-env.bat → Opción 1

# 2. Trabajar normalmente en localhost
http://localhost/AlbinoL/

# 3. Ver cambios inmediatamente (caché reducido)
```

### Para Subir a Producción:
```bash
# 1. Activar modo producción
switch-env.bat → Opción 2

# 2. Subir archivos al servidor
# 3. Verificar que HTTPS funcione correctamente
```

## 📊 Beneficios de la Configuración Dual

### En Desarrollo:
- 🚀 **Sin errores de certificado**
- 🔄 **Cambios visibles inmediatamente**
- 🛠️ **Debugging más fácil**
- ⚡ **Carga rápida en localhost**

### En Producción:
- 🔒 **Seguridad HTTPS completa**
- 📱 **Optimización móvil máxima**
- 🗜️ **Compresión avanzada**
- ⚡ **Caché agresivo para performance**

## 🎯 Resultado Final

- ✅ **Error de certificado resuelto**
- ✅ **Desarrollo local funcional**
- ✅ **Optimizaciones de producción mantenidas**
- ✅ **Switcher automático entre entornos**
- ✅ **Performance optimizada en ambos casos**

¡Ahora puedes desarrollar en localhost sin problemas y mantener todas las optimizaciones para producción!
