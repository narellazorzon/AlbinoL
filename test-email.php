<?php
/**
 * Script de prueba para el sistema de email
 * Albino Luis Zorzon e hijos
 */

// Incluir configuración de PHPMailer
require_once 'includes/phpmailer-config.php';

echo "<h2>🧪 Prueba del Sistema de Email</h2>";

// Datos de prueba
$nombre = "Prueba Sistema";
$email = "test@ejemplo.com";
$telefono = "123456789";
$asunto = "Prueba de Email";
$mensaje = "Este es un mensaje de prueba para verificar que el sistema de email funciona correctamente.";

echo "<p><strong>Probando envío de email...</strong></p>";

// Intentar enviar email
$resultado = enviarEmailPHPMailer($nombre, $email, $telefono, $asunto, $mensaje);

if ($resultado['success']) {
    echo "<p style='color: green;'>✅ <strong>Éxito:</strong> " . $resultado['message'] . "</p>";
} else {
    echo "<p style='color: red;'>❌ <strong>Error:</strong> " . $resultado['message'] . "</p>";
}

// Verificar si se creó el log de errores
if (file_exists('includes/phpmailer-errors.log')) {
    echo "<h3>📋 Log de Errores:</h3>";
    echo "<pre>" . htmlspecialchars(file_get_contents('includes/phpmailer-errors.log')) . "</pre>";
} else {
    echo "<p>✅ No hay errores en el log.</p>";
}

// Verificar mensajes guardados
echo "<h3>📁 Mensajes Guardados:</h3>";
$mensajes_dir = 'includes/mensajes/';
if (is_dir($mensajes_dir)) {
    $archivos = glob($mensajes_dir . '*.txt');
    $ultimo_archivo = end($archivos);
    if ($ultimo_archivo) {
        echo "<p><strong>Último mensaje guardado:</strong> " . basename($ultimo_archivo) . "</p>";
        echo "<pre>" . htmlspecialchars(file_get_contents($ultimo_archivo)) . "</pre>";
    }
}

echo "<hr>";
echo "<p><a href='pages/contacto.php'>← Volver al formulario de contacto</a></p>";
?>
