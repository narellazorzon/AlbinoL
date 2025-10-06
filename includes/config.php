<?php
/**
 * Configuración del sitio web - Albino Luis Zorzon e hijos
 * Archivo de configuración central para el sitio web
 */

// Configuración de la base de datos (si se necesita en el futuro)
define('DB_HOST', 'localhost');
define('DB_NAME', 'albinoluis_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configuración del sitio
// SITE_NAME definido en email-config.php
define('SITE_URL', 'http://localhost/AlbinoL');
// SITE_EMAIL definido en email-config.php

// Configuración de ubicación
define('SITE_ADDRESS', 'Zona Rural La Lola');
define('SITE_CITY', 'Provincia de Santa Fe');
define('SITE_COUNTRY', 'Argentina');

// Configuración de archivos
define('UPLOAD_PATH', __DIR__ . '/uploads/');
define('ASSETS_PATH', __DIR__ . '/assets/');
define('PARTIALS_PATH', __DIR__ . '/partials/');

// Configuración de seguridad
define('SALT', 'albinoluis2024_salt_secure');
define('SESSION_TIMEOUT', 3600); // 1 hora

// Configuración de email (movida a email-config.php)

// Configuración de cache
define('CACHE_ENABLED', true);
define('CACHE_TIME', 3600); // 1 hora

// Configuración de debug (cambiar a false en producción)
define('DEBUG_MODE', true);

// Función para obtener la URL base del sitio
function getBaseUrl() {
    return SITE_URL;
}

// Función para obtener la ruta de assets
function getAssetPath($file) {
    return getBaseUrl() . '/assets/' . $file;
}

// Función para formatear números
function formatNumber($number) {
    return number_format($number, 0, ',', '.');
}

// Función para formatear teléfono
function formatPhone($phone) {
    return preg_replace('/(\d{2})(\d{4})(\d{4})/', '$1 $2-$3', $phone);
}

// Configuración de zona horaria
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir configuración de rutas
require_once __DIR__ . '/paths.php';

// Configuración de errores
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?>
