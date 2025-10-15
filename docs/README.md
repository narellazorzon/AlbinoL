# Albino Luis Zorzon e hijos - Sitio Web

Sitio web corporativo para la empresa familiar de producción agropecuaria "Albino Luis Zorzon e hijos".

## 📁 Estructura del Proyecto

```
AlbinoL/
├── assets/                 # Recursos estáticos
│   ├── css/               # Hojas de estilo
│   │   └── style.css      # Estilos principales
│   ├── js/                # Scripts JavaScript
│   │   └── app.js         # JavaScript principal
│   └── images/            # Imágenes y logos
│       └── logo_albino_comprimido.webp       # Logo de la empresa
├── partials/              # Componentes reutilizables
│   ├── header.php         # Cabecera del sitio
│   └── footer.php         # Pie de página
├── config.php             # Configuración del sitio
├── index.php              # Página principal
├── 404.php                # Página de error 404
├── .htaccess              # Configuración del servidor Apache
└── README.md              # Este archivo
```

## 🚀 Características

- **Diseño Responsivo**: Adaptable a dispositivos móviles y desktop
- **Optimización SEO**: Meta tags y estructura semántica
- **Animaciones Suaves**: Efectos de scroll y transiciones
- **Configuración Centralizada**: Archivo config.php para fácil mantenimiento
- **Seguridad**: Headers de seguridad y configuración .htaccess
- **Cache**: Configuración de cache para mejor rendimiento

## 🛠️ Tecnologías Utilizadas

- **PHP**: Backend del sitio web
- **HTML5**: Estructura semántica
- **CSS3**: Estilos modernos con variables CSS
- **JavaScript**: Interactividad y animaciones
- **Apache**: Servidor web con configuración .htaccess

## 📋 Instalación

1. Clonar o descargar el proyecto
2. Colocar en el directorio web de XAMPP (`htdocs/`)
3. Acceder a `http://localhost/AlbinoL/`

## ⚙️ Configuración

Editar el archivo `config.php` para personalizar:
- Información de contacto
- Configuración de base de datos
- Configuración de email
- URLs del sitio

## 🎨 Personalización

### Colores
Los colores están definidos en variables CSS en `assets/css/style.css`:
- `--primary-green`: Verde principal
- `--secondary-green`: Verde secundario
- `--accent-green`: Verde de acento
- `--earth-brown`: Marrón tierra
- `--golden-wheat`: Dorado del trigo

### Contenido
- Editar `partials/header.php` para la navegación
- Editar `partials/footer.php` para el pie de página
- Editar `index.php` para el contenido principal

## 📱 Responsive Design

El sitio está optimizado para:
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (320px - 767px)

## 🔧 Mantenimiento

- **Logs**: Revisar logs de Apache para errores
- **Cache**: Limpiar cache del navegador si hay problemas
- **Backup**: Realizar copias de seguridad regulares
- **Actualizaciones**: Mantener PHP y Apache actualizados

## 📞 Soporte

Para soporte técnico o consultas sobre el sitio web, contactar al desarrollador.

---
*Desarrollado con ❤️ para el campo argentino*