<?php
/**
 * Configuración de rutas para la nueva estructura
 * Albino Luis Zorzon e hijos
 */

// Definir rutas base
define('ROOT_PATH', __DIR__ . '/../');
define('PAGES_PATH', ROOT_PATH . 'pages/');
define('INCLUDES_PATH', ROOT_PATH . 'includes/');
define('DOCS_PATH', ROOT_PATH . 'docs/');
define('LOGS_PATH', ROOT_PATH . 'logs/');

// URLs base
define('BASE_URL', SITE_URL);
define('PAGES_URL', BASE_URL . '/pages/');
define('ASSETS_URL', BASE_URL . '/assets/');
define('INCLUDES_URL', BASE_URL . '/includes/');

// Función para obtener la URL de una página
function getPageUrl($page) {
    return PAGES_URL . $page;
}

// Función para obtener la URL de un asset
function getAssetUrl($asset) {
    return ASSETS_URL . $asset;
}

// Función para incluir una página
function includePage($page) {
    $file = PAGES_PATH . $page . '.php';
    if (file_exists($file)) {
        include $file;
    } else {
        if (DEBUG_MODE) {
            echo "<!-- Error: Page '$page' not found -->";
        }
    }
}

// Función para incluir un partial
function includePartial($partial) {
    $file = PARTIALS_PATH . $partial . '.php';
    if (file_exists($file)) {
        include $file;
    } else {
        if (DEBUG_MODE) {
            echo "<!-- Error: Partial '$partial' not found -->";
        }
    }
}

// Función para obtener la ruta relativa desde una página
function getRelativePath($from, $to) {
    $fromParts = explode('/', $from);
    $toParts = explode('/', $to);
    
    // Remover el último elemento si es un archivo
    if (pathinfo($from, PATHINFO_EXTENSION)) {
        array_pop($fromParts);
    }
    
    $fromDepth = count($fromParts);
    $relativePath = str_repeat('../', $fromDepth) . $to;
    
    return $relativePath;
}

// Función para redirigir a una página
function redirectToPage($page) {
    header('Location: ' . getPageUrl($page));
    exit;
}

// Función para redirigir al inicio
function redirectToHome() {
    header('Location: ' . BASE_URL);
    exit;
}

// Función para obtener la página actual
function getCurrentPage() {
    $script = $_SERVER['SCRIPT_NAME'];
    $page = basename($script, '.php');
    
    // Si estamos en la raíz, es index
    if (dirname($script) === '/' || dirname($script) === '\\') {
        return 'index';
    }
    
    return $page;
}

// Función para verificar si es la página actual
function isCurrentPage($page) {
    return getCurrentPage() === $page;
}

// Función para obtener el título de la página
function getPageTitle($page) {
    $titles = [
        'index' => 'Albino Luis Zorzon — Agricultura y Ganadería',
        'agricultura' => 'Agricultura - Albino Luis Zorzon',
        'ganaderia' => 'Ganadería - Albino Luis Zorzon',
        'maquinaria-logistica' => 'Maquinaria & Logística - Albino Luis Zorzon',
        'nosotros' => 'Nosotros - Albino Luis Zorzon',
        'rrhh' => 'Recursos Humanos - Albino Luis Zorzon',
        'contacto' => 'Contacto - Albino Luis Zorzon',
        '404' => 'Página no encontrada - Albino Luis Zorzon'
    ];
    
    return $titles[$page] ?? SITE_NAME;
}

// Función para obtener la descripción de la página
function getPageDescription($page) {
    $descriptions = [
        'index' => 'Empresa familiar con más de 30 años de experiencia en producción agropecuaria de alto rendimiento. Agricultura, ganadería, maquinaria y logística.',
        'agricultura' => 'Producción de cereales, oleaginosas y forrajeras con tecnología de punta y prácticas sustentables.',
        'ganaderia' => 'Cría y engorde de ganado bovino con manejo integral y alimentación balanceada.',
        'maquinaria-logistica' => 'Servicios de maquinaria agrícola moderna y logística para siembra, cosecha y transporte.',
        'nosotros' => 'Conoce nuestra historia familiar de más de 30 años en la producción agropecuaria.',
        'rrhh' => 'Únete a nuestro equipo familiar. Oportunidades de trabajo en el sector agropecuario.',
        'contacto' => 'Contactanos para conocer más sobre nuestros servicios agropecuarios. Estamos en Zona Rural La Lola, Santa Fe.',
        '404' => 'La página que buscas no existe. Regresa al inicio de nuestro sitio web.'
    ];
    
    return $descriptions[$page] ?? 'Empresa agropecuaria familiar: agricultura, ganadería, logística y maquinaria.';
}
?>
