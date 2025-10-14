# 📧 Configurar PHPMailer con Gmail - Albino Luis Zorzon

## ✅ PHPMailer Instalado

Ya tienes PHPMailer instalado en la carpeta `PHPMailer-master/`. Ahora solo necesitas configurar Gmail.

## 🔧 Configuración Requerida

### Paso 1: Configurar Gmail (Obligatorio)

1. **Activar verificación en 2 pasos** en tu cuenta de Gmail
2. **Generar contraseña de aplicación**:
   - Ve a tu cuenta de Google
   - Seguridad → Verificación en 2 pasos
   - Contraseñas de aplicaciones
   - Genera una nueva contraseña para "Mail"
   - **Nombre sugerido**: "Sitio Web Albino Luis Zorzon"
   - Copia la contraseña de 16 caracteres

### Paso 2: Actualizar la configuración

**Archivo:** `includes/phpmailer-config.php`  
**Línea:** 12

```php
define('GMAIL_PASSWORD', 'tu_app_password_aqui'); // Cambiar por tu contraseña de aplicación
```

**Reemplaza** `'tu_app_password_aqui'` con la contraseña de 16 caracteres que generaste.

## 🚀 Características del Sistema PHPMailer

### ✅ Ventajas:
- **Muy confiable** - PHPMailer es el estándar de la industria
- **Emails HTML hermosos** - Diseño profesional
- **Gmail SMTP** - Usa el servidor de Gmail directamente
- **Backup automático** - Siempre guarda en archivos
- **Logs detallados** - Errores específicos en `phpmailer-errors.log`
- **Texto plano** - Versión alternativa para todos los clientes

### 📧 Contenido del Email:
- **Header profesional** con colores de la empresa
- **Información completa** del contacto
- **Mensaje formateado** y legible
- **Metadatos** (fecha, IP, user agent)
- **Footer** con información de la empresa
- **Versión texto plano** para compatibilidad

## 🧪 Probar el Sistema

1. **Configura la contraseña de aplicación** de Gmail
2. **Envía un mensaje de prueba** desde el formulario
3. **Verifica que llegue** a alzorzon@gmail.com
4. **Revisa los logs** si hay errores

## 📁 Archivos del Sistema

- `includes/phpmailer-config.php` - Configuración principal de PHPMailer
- `includes/enviar-mensaje.php` - Procesador del formulario
- `PHPMailer-master/` - Librería PHPMailer
- `includes/mensajes/` - Mensajes guardados (backup)
- `includes/phpmailer-errors.log` - Log de errores de PHPMailer

## 🆘 Solución de Problemas

### Si no llegan los emails:

1. **Verifica la contraseña de aplicación** de Gmail
2. **Revisa** `includes/phpmailer-errors.log`
3. **Confirma** que la verificación en 2 pasos esté activada
4. **Verifica** que el puerto 587 esté abierto

### Errores comunes:

- **"Authentication failed"** → Contraseña de aplicación incorrecta
- **"Connection refused"** → Problema de red o firewall
- **"SMTP Error"** → Configuración de Gmail incorrecta

## 📊 Estado Actual

✅ **PHPMailer instalado** - Librería lista  
✅ **Sistema configurado** - Código preparado  
✅ **Backup funcionando** - Mensajes se guardan  
⚠️ **Pendiente** - Configurar contraseña de Gmail  

## 🎯 Próximos Pasos

1. **Generar contraseña de aplicación** de Gmail
2. **Actualizar** `GMAIL_PASSWORD` en `phpmailer-config.php`
3. **Probar** envío de email
4. **Verificar** que llegue a alzorzon@gmail.com

¡Una vez configurado, tendrás un sistema de email profesional y confiable!
