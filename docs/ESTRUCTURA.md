# 📁 Estructura del Proyecto - Albino Luis Zorzon

## 🎯 Nueva Estructura Organizada

La estructura del proyecto ha sido reorganizada para mejorar la mantenibilidad, escalabilidad y organización del código.

## 📂 Estructura de Carpetas

```
AlbinoL/
├── 📄 index.php              # Página principal
├── 📄 404.php                # Página de error 404
├── 📁 pages/                 # Páginas del sitio web
│   ├── agricultura.php       # Servicios agrícolas
│   ├── ganaderia.php         # Servicios ganaderos
│   ├── maquinaria-logistica.php # Maquinaria y logística
│   ├── nosotros.php          # Historia de la empresa
│   ├── rrhh.php              # Recursos humanos
│   └── contacto.php          # Formulario de contacto
├── 📁 includes/              # Archivos de procesamiento
│   ├── config.php            # Configuración del sitio
│   ├── enviar-mensaje.php    # Procesador de formularios
│   └── paths.php             # Configuración de rutas
├── 📁 partials/              # Componentes reutilizables
│   ├── header.php            # Cabecera del sitio
│   └── footer.php            # Pie de página
├── 📁 assets/                # Recursos estáticos
│   ├── css/
│   │   └── style.css         # Estilos principales
│   ├── js/
│   │   ├── app.js            # JavaScript principal
│   │   └── form-validation.js # Validación de formularios
│   └── images/
│       └── logo_comp.png          # Logo de la empresa
├── 📁 docs/                  # Documentación
│   ├── README.md             # Documentación técnica
│   ├── ACCESIBILIDAD.md      # Guía de accesibilidad
│   └── ESTRUCTURA.md         # Este archivo
├── 📁 logs/                  # Archivos de registro
├── 📄 .htaccess              # Configuración del servidor
└── 📄 README.md              # Documentación principal
```

## 🎯 Principios de Organización

### 1. **Separación de Responsabilidades**
- **Páginas** (`pages/`): Contenido específico de cada sección
- **Includes** (`includes/`): Lógica de procesamiento y configuración
- **Partials** (`partials/`): Componentes reutilizables
- **Assets** (`assets/`): Recursos estáticos organizados por tipo

### 2. **Escalabilidad**
- Fácil agregar nuevas páginas en `pages/`
- Configuración centralizada en `includes/`
- Componentes reutilizables en `partials/`
- Recursos organizados por tipo en `assets/`

### 3. **Mantenibilidad**
- Estructura clara y lógica
- Separación de archivos por función
- Documentación organizada en `docs/`
- Configuración centralizada

## 📋 Descripción de Carpetas

### 📁 **pages/**
Contiene todas las páginas del sitio web:
- **agricultura.php** - Servicios agrícolas y cultivos
- **ganaderia.php** - Servicios ganaderos y razas
- **maquinaria-logistica.php** - Equipos y servicios logísticos
- **nosotros.php** - Historia y valores de la empresa
- **rrhh.php** - Oportunidades laborales
- **contacto.php** - Formulario de contacto accesible

### 📁 **includes/**
Archivos de procesamiento y configuración:
- **config.php** - Configuración principal del sitio
- **enviar-mensaje.php** - Procesador del formulario de contacto
- **paths.php** - Configuración de rutas y funciones utilitarias

### 📁 **partials/**
Componentes reutilizables:
- **header.php** - Cabecera del sitio con navegación
- **footer.php** - Pie de página con información de contacto

### 📁 **assets/**
Recursos estáticos organizados por tipo:
- **css/** - Hojas de estilo
- **js/** - Scripts JavaScript
- **images/** - Imágenes y logos

### 📁 **docs/**
Documentación del proyecto:
- **README.md** - Documentación técnica
- **ACCESIBILIDAD.md** - Guía de accesibilidad
- **ESTRUCTURA.md** - Este archivo

### 📁 **logs/**
Archivos de registro del sistema:
- Logs de contactos
- Logs de errores
- Logs de actividad

## 🔧 Configuración de Rutas

### **Archivo `includes/paths.php`**
Contiene funciones utilitarias para manejo de rutas:

```php
// Obtener URL de una página
getPageUrl($page)

// Obtener URL de un asset
getAssetUrl($asset)

// Incluir una página
includePage($page)

// Incluir un partial
includePartial($partial)

// Obtener ruta relativa
getRelativePath($from, $to)

// Redirigir a una página
redirectToPage($page)

// Verificar página actual
isCurrentPage($page)
```

## 🌐 Redirecciones

### **Archivo `.htaccess`**
Configurado para redirigir automáticamente las rutas antiguas:

```apache
# Redireccionar páginas antiguas a la nueva estructura
RewriteRule ^agricultura\.php$ /pages/agricultura.php [R=301,L]
RewriteRule ^ganaderia\.php$ /pages/ganaderia.php [R=301,L]
RewriteRule ^maquinaria-logistica\.php$ /pages/maquinaria-logistica.php [R=301,L]
RewriteRule ^nosotros\.php$ /pages/nosotros.php [R=301,L]
RewriteRule ^rrhh\.php$ /pages/rrhh.php [R=301,L]
RewriteRule ^contacto\.php$ /pages/contacto.php [R=301,L]
```

## 📱 URLs del Sitio

### **Páginas Principales**
- **Inicio:** `/index.php`
- **Agricultura:** `/pages/agricultura.php`
- **Ganadería:** `/pages/ganaderia.php`
- **Maquinaria:** `/pages/maquinaria-logistica.php`
- **Nosotros:** `/pages/nosotros.php`
- **RR.HH.:** `/pages/rrhh.php`
- **Contacto:** `/pages/contacto.php`

### **Redirecciones Automáticas**
- `/agricultura.php` → `/pages/agricultura.php`
- `/ganaderia.php` → `/pages/ganaderia.php`
- `/maquinaria-logistica.php` → `/pages/maquinaria-logistica.php`
- `/nosotros.php` → `/pages/nosotros.php`
- `/rrhh.php` → `/pages/rrhh.php`
- `/contacto.php` → `/pages/contacto.php`

## 🚀 Beneficios de la Nueva Estructura

### **1. Organización**
- ✅ Separación clara de responsabilidades
- ✅ Archivos agrupados por función
- ✅ Estructura lógica y comprensible

### **2. Mantenibilidad**
- ✅ Fácil localización de archivos
- ✅ Configuración centralizada
- ✅ Componentes reutilizables

### **3. Escalabilidad**
- ✅ Fácil agregar nuevas páginas
- ✅ Estructura preparada para crecimiento
- ✅ Separación de lógica y presentación

### **4. Seguridad**
- ✅ Archivos de procesamiento en carpeta separada
- ✅ Configuración de rutas centralizada
- ✅ Separación de archivos sensibles

### **5. Desarrollo**
- ✅ Estructura estándar de la industria
- ✅ Fácil colaboración en equipo
- ✅ Documentación organizada

## 📋 Migración Completada

### **Archivos Movidos**
- ✅ Páginas → `pages/`
- ✅ Archivos de procesamiento → `includes/`
- ✅ Documentación → `docs/`
- ✅ Rutas actualizadas en todos los archivos

### **Configuración Actualizada**
- ✅ `.htaccess` con redirecciones
- ✅ `config.php` con nuevas rutas
- ✅ `paths.php` con funciones utilitarias
- ✅ Navegación actualizada

### **Compatibilidad Mantenida**
- ✅ Redirecciones automáticas
- ✅ URLs antiguas funcionan
- ✅ Sin pérdida de funcionalidad
- ✅ SEO preservado

---

**Resultado:** Una estructura de proyecto profesional, organizada y escalable que facilita el mantenimiento y desarrollo futuro. 🌾✨
