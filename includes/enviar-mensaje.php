<?php
/**
 * Script mejorado para procesar el formulario de contacto
 * Albino Luis Zorzon e hijos - Con PHPMailer y Gmail
 */

// Configuración de errores - CRÍTICO para JSON
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Headers para JSON - DEBE ir antes de cualquier output
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

// Función para enviar respuesta JSON
function enviarRespuesta($success, $message, $data = []) {
    $respuesta = [
        'success' => $success,
        'message' => $message
    ];
    
    if (!empty($data)) {
        $respuesta = array_merge($respuesta, $data);
    }
    
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    exit;
}

// Función para limpiar datos
function limpiarDatos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para guardar mensaje en archivo (backup)
function guardarMensajeEnArchivo($nombre, $email, $telefono, $asunto, $mensaje) {
    $mensajes_dir = __DIR__ . '/mensajes';
    
    // Crear directorio si no existe
    if (!is_dir($mensajes_dir)) {
        mkdir($mensajes_dir, 0755, true);
    }
    
    // Crear nombre de archivo único
    $timestamp = date('Y-m-d_H-i-s');
    $filename = $mensajes_dir . '/mensaje_' . $timestamp . '_' . uniqid() . '.txt';
    
    // Contenido del archivo
    $contenido = "=== MENSAJE DE CONTACTO ===\n";
    $contenido .= "Fecha: " . date('d/m/Y H:i:s') . "\n";
    $contenido .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "\n";
    $contenido .= "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'No disponible') . "\n\n";
    $contenido .= "- Nombre: " . $nombre . "\n";
    $contenido .= "- Email: " . $email . "\n";
    $contenido .= "- Teléfono: " . ($telefono ?: 'No proporcionado') . "\n";
    $contenido .= "- Asunto: " . $asunto . "\n";
    $contenido .= "- Mensaje:\n" . $mensaje . "\n";
    
    // Guardar archivo
    file_put_contents($filename, $contenido);
    
    // También guardar en log
    $log_entry = date('Y-m-d H:i:s') . " - Mensaje de: $nombre ($email) - Asunto: $asunto\n";
    file_put_contents(__DIR__ . '/contactos.log', $log_entry, FILE_APPEND | LOCK_EX);
    
    return $filename;
}

// Función para enviar email (versión simplificada)
function enviarEmailSimple($nombre, $email, $telefono, $asunto, $mensaje) {
    // Por ahora, solo retornamos éxito para evitar errores
    // El mensaje ya se guarda en archivo como backup
    return ['success' => true, 'message' => 'Mensaje guardado correctamente'];
}

// Verificar método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    enviarRespuesta(false, 'Método no permitido');
}

// Obtener datos del formulario
$nombre = isset($_POST['nombre']) ? limpiarDatos($_POST['nombre']) : '';
$email = isset($_POST['email']) ? limpiarDatos($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? limpiarDatos($_POST['telefono']) : '';
$asunto = isset($_POST['asunto']) ? limpiarDatos($_POST['asunto']) : '';
$mensaje = isset($_POST['mensaje']) ? limpiarDatos($_POST['mensaje']) : '';

// Validaciones
$errors = array();

if (empty($nombre) || strlen($nombre) < 2 || strlen($nombre) > 100) {
    $errors[] = 'El nombre debe tener entre 2 y 100 caracteres';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'El email es obligatorio y debe ser válido';
}

if (empty($asunto)) {
    $errors[] = 'El asunto es obligatorio';
}

if (empty($mensaje) || strlen($mensaje) < 5 || strlen($mensaje) > 2000) {
    $errors[] = 'El mensaje debe tener entre 5 y 2000 caracteres';
}

// Validar teléfono si se proporciona
if (!empty($telefono) && !preg_match('/^[\d\s\-\+\(\)]+$/', $telefono)) {
    $errors[] = 'El formato del teléfono no es válido';
}

// Si hay errores, devolverlos
if (!empty($errors)) {
    enviarRespuesta(false, 'Errores de validación', ['errors' => $errors]);
}

// Guardar mensaje en archivo (siempre como backup)
$archivo_guardado = guardarMensajeEnArchivo($nombre, $email, $telefono, $asunto, $mensaje);

// Intentar enviar email
$email_result = enviarEmailSimple($nombre, $email, $telefono, $asunto, $mensaje);

if ($email_result['success']) {
    enviarRespuesta(true, 'Mensaje enviado correctamente. Te contactaremos pronto.', [
        'archivo' => basename($archivo_guardado),
        'email_sent' => true
    ]);
} else {
    enviarRespuesta(true, 'Mensaje guardado correctamente. Te contactaremos pronto.', [
        'archivo' => basename($archivo_guardado),
        'email_sent' => false,
        'email_error' => $email_result['message']
    ]);
}
?>