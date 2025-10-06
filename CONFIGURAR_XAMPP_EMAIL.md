# 📧 Configurar Email en XAMPP - Albino Luis Zorzon

## 🚨 Problema Identificado

XAMPP por defecto no tiene configurado un servidor SMTP, por eso los emails no se envían. Te doy **3 soluciones**:

## 🔧 Solución 1: Configurar XAMPP para Gmail (Recomendada)

### Paso 1: Editar php.ini
1. **Abre el archivo** `C:\xampp\php\php.ini`
2. **Busca la sección** `[mail function]`
3. **Modifica estas líneas:**

```ini
[mail function]
; For Win32 only.
SMTP = smtp.gmail.com
smtp_port = 587
sendmail_from = alzorzon@gmail.com
```

### Paso 2: Instalar PHPMailer (Opcional pero recomendado)
```bash
# En la carpeta del proyecto
composer require phpmailer/phpmailer
```

### Paso 3: Reiniciar Apache
1. **Abre XAMPP Control Panel**
2. **Detén Apache**
3. **Inicia Apache nuevamente**

## 🔧 Solución 2: Usar SendGrid (Gratis)

### Ventajas:
- ✅ 100 emails gratis por día
- ✅ Muy confiable
- ✅ Fácil configuración

### Pasos:
1. **Regístrate en** [sendgrid.com](https://sendgrid.com)
2. **Crea una API Key**
3. **Actualiza** `includes/sendgrid-email.php` con tu API key
4. **Modifica** `includes/enviar-mensaje.php` para usar SendGrid

## 🔧 Solución 3: Usar Mailgun (Gratis)

### Ventajas:
- ✅ 5,000 emails gratis por mes
- ✅ Muy confiable
- ✅ Fácil configuración

### Pasos:
1. **Regístrate en** [mailgun.com](https://mailgun.com)
2. **Verifica tu dominio** o usa el dominio de prueba
3. **Crea una API Key**
4. **Actualiza** `includes/sendgrid-email.php` con tu API key

## 🚀 Solución Rápida: Solo Archivos (Ya funciona)

**El sistema ya está funcionando** guardando los mensajes en archivos:

- **Mensajes guardados en:** `includes/mensajes/`
- **Log de mensajes:** `includes/contactos.log`
- **Ver mensajes:** `http://localhost/AlbinoL/includes/ver-mensajes.php`

## 📋 Estado Actual

✅ **Formulario funciona** - Se envían los datos  
✅ **Validación funciona** - Campos obligatorios  
✅ **Backup funciona** - Se guardan en archivos  
❌ **Email no funciona** - XAMPP sin SMTP configurado  

## 🎯 Recomendación

**Para producción:** Usa SendGrid o Mailgun  
**Para desarrollo:** El sistema de archivos ya funciona perfectamente  

## 📞 Próximos Pasos

1. **Elige una solución** (recomiendo SendGrid)
2. **Configura el servicio** elegido
3. **Prueba el envío** de emails
4. **Verifica** que lleguen a alzorzon@gmail.com

¿Cuál solución prefieres implementar?
