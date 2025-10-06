# 📧 Configuración de Email - Albino Luis Zorzon

## Sistema de Email Mejorado

He implementado un sistema de email mejorado que utiliza la función `mail()` nativa de PHP con configuración optimizada para Gmail.

## 🔧 Configuración Requerida

### 1. Configurar Gmail (Recomendado)

Para usar Gmail como servidor SMTP, necesitas:

1. **Activar la verificación en 2 pasos** en tu cuenta de Gmail
2. **Generar una contraseña de aplicación**:
   - Ve a tu cuenta de Google
   - Seguridad → Verificación en 2 pasos
   - Contraseñas de aplicaciones
   - Genera una nueva contraseña para "Mail"
   - Copia la contraseña generada (16 caracteres)

3. **Actualizar la configuración** en `includes/email-config.php`:
   ```php
   define('SMTP_PASSWORD', 'tu_app_password_aqui'); // Reemplazar con la contraseña de aplicación
   ```

### 2. Configuración Actual

El archivo `includes/email-config.php` está configurado con:

```php
// Configuración SMTP
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'alzorzon@gmail.com');
define('SMTP_PASSWORD', 'tu_app_password_aqui'); // ⚠️ CAMBIAR ESTO
define('SMTP_ENCRYPTION', 'tls');

// Configuración del remitente
define('FROM_EMAIL', 'alzorzon@gmail.com');
define('FROM_NAME', 'Albino Luis Zorzon e hijos');

// Configuración del destinatario
define('TO_EMAIL', 'alzorzon@gmail.com');
define('TO_NAME', 'Albino Luis Zorzon');
```

## 🚀 Características del Sistema

### ✅ Ventajas del nuevo sistema:

1. **Emails HTML hermosos**: Diseño profesional con colores de la empresa
2. **Validación mejorada**: Mejor detección de errores
3. **Backup automático**: Siempre guarda los mensajes en archivos
4. **Información detallada**: IP, fecha, user agent
5. **Responsive**: Los emails se ven bien en móviles
6. **Seguro**: Validación de datos y sanitización

### 📧 Contenido del Email:

- **Header**: Con logo y colores de la empresa
- **Información del contacto**: Nombre, email, teléfono, asunto
- **Mensaje**: Formateado y legible
- **Metadatos**: Fecha, IP, user agent
- **Footer**: Información de la empresa

## 🔧 Alternativas de Configuración

### Opción 1: Gmail (Recomendado)
- Más confiable
- Fácil configuración
- Emails llegan a la bandeja principal

### Opción 2: Otros proveedores SMTP
Puedes cambiar la configuración para usar otros proveedores:

```php
// Para Outlook/Hotmail
define('SMTP_HOST', 'smtp-mail.outlook.com');
define('SMTP_PORT', 587);

// Para Yahoo
define('SMTP_HOST', 'smtp.mail.yahoo.com');
define('SMTP_PORT', 587);
```

### Opción 3: Servidor SMTP local
Si tienes un servidor SMTP configurado:

```php
define('SMTP_HOST', 'localhost');
define('SMTP_PORT', 25);
define('SMTP_USERNAME', '');
define('SMTP_PASSWORD', '');
define('SMTP_ENCRYPTION', '');
```

## 🧪 Pruebas

Para probar el sistema:

1. **Configura la contraseña de aplicación de Gmail**
2. **Envía un mensaje de prueba** desde el formulario de contacto
3. **Verifica que llegue el email** a alzorzon@gmail.com
4. **Revisa los archivos guardados** en `includes/mensajes/`

## 📁 Archivos del Sistema

- `includes/email-config.php` - Configuración principal
- `includes/enviar-mensaje.php` - Procesador del formulario
- `includes/mensajes/` - Carpeta con mensajes guardados
- `includes/contactos.log` - Log de mensajes
- `includes/ver-mensajes.php` - Interfaz para ver mensajes

## 🆘 Solución de Problemas

### Si no llegan los emails:

1. **Verifica la contraseña de aplicación** de Gmail
2. **Revisa el log de errores** de PHP
3. **Confirma que el servidor tenga acceso a internet**
4. **Verifica que el puerto 587 esté abierto**

### Si hay errores de validación:

1. **Revisa que todos los campos obligatorios estén completos**
2. **Verifica el formato del email**
3. **Confirma que el mensaje tenga al menos 5 caracteres**

## 📞 Soporte

Si necesitas ayuda con la configuración, revisa:
- Los logs en `includes/contactos.log`
- Los archivos de mensajes en `includes/mensajes/`
- La interfaz de administración en `includes/ver-mensajes.php`
