# 🛠️ Guía de Mantenimiento - AlbinoL

## 📁 Archivos Creados

- `maintenance.html` - Página de mantenimiento profesional
- `.htaccess` - Configuración de redirección (modo mantenimiento desactivado por defecto)

## 🚀 Cómo Activar el Modo Mantenimiento

### Opción 1: Editar .htaccess (Recomendado)
1. Abre el archivo `.htaccess`
2. Busca las líneas del bloque "MODO MANTENIMIENTO ACTIVO" (líneas 22-39)
3. **Descomenta** todas las líneas que empiezan con `# RewriteCond` y `# RewriteRule`
4. Guarda el archivo

### Opción 2: Renombrar archivo
1. Renombra `.htaccess` a `.htaccess.backup`
2. Crea un nuevo `.htaccess` solo con la configuración de mantenimiento

## 🔧 Cómo Desactivar el Modo Mantenimiento

1. Abre el archivo `.htaccess`
2. Busca las líneas del bloque "MODO MANTENIMIENTO ACTIVO" (líneas 22-39)
3. **Comenta** todas las líneas que empiezan con `RewriteCond` y `RewriteRule` (agrega `#` al inicio)
4. Guarda el archivo

## 🔐 Configurar IP de Administrador

Para poder acceder al sitio completo durante el mantenimiento:

1. Descubre tu IP pública: [whatismyipaddress.com](https://whatismyipaddress.com/)
2. Abre `.htaccess`
3. Busca: `RewriteCond %{REMOTE_ADDR} !^190\.23\.45\.67$`
4. Reemplaza `190.23.45.67` con tu IP real
5. Guarda el archivo

### Para múltiples IPs:
```apache
RewriteCond %{REMOTE_ADDR} !^192\.168\.1\.100$
RewriteCond %{REMOTE_ADDR} !^10\.0\.0\.50$
```

## 🎨 Personalizar la Página de Mantenimiento

### Cambiar el logo:
1. Reemplaza `/assets/images/logo.png` en `maintenance.html`
2. O actualiza la ruta en la línea 67 del archivo

### Cambiar colores:
Edita las variables CSS en `maintenance.html`:
```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
color: #2c3e50;
```

### Cambiar mensaje:
Modifica el texto en la sección `.maintenance-message` del HTML

## ✅ Verificación

### Antes de activar:
- [ ] Verificar que `maintenance.html` existe
- [ ] Configurar tu IP en `.htaccess`
- [ ] Probar acceso desde tu IP

### Después de activar:
- [ ] Verificar redirección desde IP externa
- [ ] Confirmar acceso completo desde tu IP
- [ ] Verificar que recursos estáticos cargan

## 🚨 Solución de Problemas

### Si no funciona la redirección:
1. Verificar que mod_rewrite está habilitado en Apache
2. Comprobar sintaxis del `.htaccess`
3. Revisar logs de Apache

### Si no puedes acceder con tu IP:
1. Verificar que la IP está correcta
2. Usar formato CIDR si es necesario: `192.168.1.0/24`
3. Agregar múltiples líneas RewriteCond

### Si hay bucles infinitos:
1. Verificar que `maintenance.html` no está siendo redirigido
2. Comprobar exclusiones de recursos estáticos

## 📱 Características de la Página

- ✅ Diseño responsive (móvil y desktop)
- ✅ Meta tag `noindex, nofollow` para SEO
- ✅ Animaciones suaves
- ✅ Logo con fallback
- ✅ Código limpio y comentado
- ✅ Compatible con todos los navegadores modernos

## 🔄 Estados del Sistema

| Estado | Archivo .htaccess | Resultado |
|--------|------------------|-----------|
| Normal | Línea comentada | Sitio funciona normalmente |
| Mantenimiento | Línea descomentada | Redirección a maintenance.html |
| Error | Sintaxis incorrecta | Error 500 (revisar logs) |

## 📞 Soporte

Si necesitas ayuda adicional:
1. Revisa los logs de Apache en `/var/log/apache2/error.log`
2. Verifica la sintaxis con herramientas online
3. Prueba con IPs diferentes para confirmar funcionamiento
